<?php

declare(strict_types=1);

namespace App\Http\Requests\User\Auth;

use App\Exceptions\User\Auth\AccountLockException;
use App\Exceptions\User\Auth\LoginFailureException;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;

class LoginRequest extends FormRequest
{
    private const LOGIN_FAILURE_COUNT = 5;

    private const LOGIN_LOCK_MINUTES = 15;

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string'],
        ];
    }

    /**
     * @return array
     */
    public function attributes(): array
    {
        return [
            'email' => __('user.email'),
            'password' => __('user.password'),
        ];
    }

    /**
     * @return void
     */
    public function authenticate(): void
    {
        $this->ensureIsNotRateLimited();

        if (! Auth::guard('user')->attempt($this->only('email', 'password'), $this->boolean('remember'))) {
            RateLimiter::hit($this->throttleKey(), self::LOGIN_LOCK_MINUTES);

            Log::info('ログインに失敗しました。', [
                'method' => __METHOD__,
            ]);

            throw new LoginFailureException();
        }

        RateLimiter::clear($this->throttleKey());
    }

    /**
     * @return void
     */
    private function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), self::LOGIN_FAILURE_COUNT)) {
            return;
        }

        Log::info('アカウントをロックしました。', [
            'method' => __METHOD__,
            'ip' => $this->ip(),
        ]);

        event(new Lockout($this));

        throw new AccountLockException();
    }

    /**
     * @return string
     */
    private function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->input('email')).'|'.$this->ip());
    }
}

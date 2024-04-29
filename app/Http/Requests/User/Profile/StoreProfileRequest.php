<?php

namespace App\Http\Requests\User\Profile;

use App\Enums\Profile\Composition;
use App\Enums\Profile\Income;
use App\Enums\Profile\Job;
use App\Http\Actions\DataTransferObjects\Input\User\Profile\StoreActionInput;
use App\Rules\AllowImageExtensions;
use BenSampo\Enum\Rules\EnumValue;
use Illuminate\Foundation\Http\FormRequest;

class StoreProfileRequest extends FormRequest
{
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
            'name' => ['required', 'string', 'max:255'],
            'age' => ['required', 'integer', 'between:0,100'],
            'job' => ['required', 'integer', new EnumValue(Job::class, false)],
            'income' => ['required', 'integer', new EnumValue(Income::class, false)],
            'composition' => ['required', 'integer', new EnumValue(Composition::class, false)],
            'body' => ['required', 'string', 'max:1000'],
            'image' => ['nullable', 'file', new AllowImageExtensions(), 'max:3072'],
        ];
    }

    /**
     * @return array
     */
    public function attributes(): array
    {
        return [
            'name' => __('profile.name'),
            'age' => __('profile.age'),
            'job' => __('profile.job'),
            'income' => __('profile.income'),
            'composition' => __('profile.composition'),
            'body' => __('profile.body'),
        ];
    }

    /**
     * @return StoreActionInput
     */
    public function makeData(): StoreActionInput
    {
        return StoreActionInput::from($this->validated());
    }
}

<?php

namespace App\Exceptions;

use App\Exceptions\Traits\CommonHandlerTrait;
use App\Exceptions\Traits\UserHandlerTrait;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class Handler extends ExceptionHandler
{
    use CommonHandlerTrait;
    use UserHandlerTrait;

    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->commonHandlerRegister();

        $this->userHandlerRegister();
    }

    /**
     * @param Throwable $e
     * @return void
     */
    public function report(Throwable $e): void
    {
        if ($this->shouldntReport($e)) {
            return;
        }

        if ($e instanceof CustomException) {
            Log::info(get_class($e).': '.$e->getMessage());

            return;
        }

        $status = ($e->getCode() === 0) ? Response::HTTP_INTERNAL_SERVER_ERROR : $e->getCode();
        $msg = ($e instanceof QueryException) ? 'SQLエラーが発生しました。' : $status.'エラーが発生しました。';

        Log::info($msg, [
            'exception' => get_class($e),
            'message' => $e->getMessage(),
            'stacktrace' => $e->getTraceAsString(),
        ]);
    }

    /**
     * all response for json
     *
     * @param [type] $request
     * @param Throwable $e
     * @return HttpResponse|JsonResponse|RedirectResponse
     */
    protected function prepareResponse($request, Throwable $e): HttpResponse|JsonResponse|RedirectResponse
    {
        return parent::prepareJsonResponse($request, $e);
    }

    /**
     * @param Throwable $e
     * @return array
     */
    protected function convertExceptionToArray(Throwable $e): array
    {
        return [
            'message' => '予期せぬエラーが発生しました。',
        ];
    }
}

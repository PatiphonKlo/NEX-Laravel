<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Exceptions\PostTooLargeException;
use Throwable;

class Handler extends ExceptionHandler
{
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
        $this->reportable(function (Throwable $e) {
            //
        });

        $this->reportable(function (PostTooLargeException $exception) {
            // สามารถเพิ่ม logic เพื่อบันทึกข้อผิดพลาดหรือส่งการแจ้งเตือนได้
        });

        $this->renderable(function (PostTooLargeException $exception, $request) {
            return response()->json([
                'error' => 'Uploaded file is too large',
            ], 413); // 413: Payload Too Large
        });
    }
}

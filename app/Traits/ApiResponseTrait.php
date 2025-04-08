<?php

namespace App\Traits;

trait ApiResponseTrait
{
 
    protected function successResponse($data = null, $message = 'تم بنجاح', $code = 200)
    {
        return response()->json([
            'status' => 'success',
            'message' => $message,
            'code' => $code,
            'data' => $data,
        ], $code);
    }

    protected function errorResponse($message = 'حدث خطأ ما', $code = 500, $errorDetails = null)
    {
        return response()->json([
            'status' => 'failed',
            'message' => $message,
            'code' => $code,
            'error' => $errorDetails,
        ], $code);
    }
}

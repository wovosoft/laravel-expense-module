<?php

namespace Wovosoft\LaravelExpenseModule\Helpers;

use Illuminate\Http\JsonResponse;

class Messages
{
    public static function success(): JsonResponse
    {
        return response()->json([
            "message" => "Successfully Done"
        ]);
    }

    public static function failed(\Throwable $throwable): JsonResponse
    {
        return response()->json([
            "message" => $throwable->getMessage(),
            "file" => $throwable->getFile(),
            "line" => $throwable->getLine()
        ], 403);
    }
}

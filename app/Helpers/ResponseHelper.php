<?php

namespace App\Helpers;

class ResponseHelper
{
    public static function success($success, $message, $data)
    {
        return response()->json([
            'data' => [
                'success'=> $success,
                'message'=> $message,
                'data'=> $data,
            ]
        ]);
    }

    public static function fail($error, $message, $code)
    {
        return response()->json([
            'data'=> [
                'error' => [
                    'success'=> $error,
                    'message'=> $message,
                ]
            ]
        ], $code);
    }
}
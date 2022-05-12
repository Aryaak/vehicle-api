<?php

namespace App\Utils;


class ResponseFormatter
{
    private static $response = [];

    public static function success($message = '', $data  = [])
    {
        self::$response['meta']['status'] =  'success!';
        self::$response['meta']['code'] =  200;
        self::$response['meta']['message'] =  $message;
        self::$response['data'] =  $data;
        return response()->json(self::$response);
    }

    public static function failed($message = '', $code = 500)
    {
        self::$response['meta']['status'] =  'failed!';
        self::$response['meta']['code'] =  $code;
        self::$response['meta']['message'] =  $message;
        return response()->json(self::$response);
    }
}

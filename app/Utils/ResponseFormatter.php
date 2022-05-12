<?php

namespace App\Utils;


class ResponseFormatter
{
    private $response = [];

    public static function success($message = '', $data  = [])
    {
        self::$response['meta']['status'] =  'success!';
        self::$response['meta']['code'] =  200;
        self::$response['meta']['messsage'] =  $message;
        self::$response['data'] =  $data;
        return response()->json(self::$response);
    }

    public function failed($message = '', $errors = [], $code = 500)
    {
        self::$response['meta']['status'] =  'failed!';
        self::$response['meta']['code'] =  $code;
        self::$response['meta']['messsage'] =  $message;
        self::$response['errors'] =  $errors;
        return response()->json(self::$response);
    }
}

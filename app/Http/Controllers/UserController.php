<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;
use Exception;
use App\Utils\ResponseFormatter;

class UserController extends Controller
{
    private $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    /**
     * Login User
     * 
     * @return \App\Utils\ResponseFormatter
     */

    public function login(Request $request)
    {
        $input = $request->all();

        try {
            $outoput = $this->service->login($input);
        } catch (Exception $e) {
            return ResponseFormatter::failed($e->getMessage(), $e->getCode());
        }

        return ResponseFormatter::success('login Success!',  $outoput);
    }
}

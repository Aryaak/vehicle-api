<?php

namespace App\Services;

use App\Repositories\User\EloquentUserRepository;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;
use Exception;
use Illuminate\Support\Facades\Validator;

class UserService
{
    private $eloquentRepo;

    public function __construct(EloquentUserRepository $eloquentRepo)
    {
        $this->eloquentRepo = $eloquentRepo;
    }

    public function login($input)
    {
        // Validate input
        $validator = Validator::make($input, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->fails()) throw new Exception($validator->errors()->first());

        $user = $this->eloquentRepo->getByEmail($input['email']);

        if (!$user || !password_verify($input['password'], $user->password)) throw new Exception("invalid Email/Password", 500);

        try {
            $data['token'] = JWTAuth::fromUser($user);
            return $data;
        } catch (JWTException $e) {
            throw new Exception($e->getMessage());
        }
    }
}

<?php

namespace App\Repositories\User;

use App\Repositories\User\UserRepository;
use App\Models\User;

class EloquentUserRepository implements UserRepository
{
    public function getByEmail($email)
    {
        return User::where('email', $email)->first();
    }
}

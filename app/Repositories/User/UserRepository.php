<?php

namespace App\Repositories\User;

interface UserRepository
{
    public function getByEmail($input);
}

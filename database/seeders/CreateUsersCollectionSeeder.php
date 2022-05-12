<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class CreateUsersCollectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'nama' => 'Admin Arya',
            'email' => 'admin@gmail.com',
            'password' => password_hash("password123", PASSWORD_DEFAULT),
            'alamat' => 'Jl. Babatan UNESA',
            'role' => 'Admin'
        ]);
    }
}

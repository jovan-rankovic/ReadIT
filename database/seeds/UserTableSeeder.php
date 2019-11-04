<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Jovan',
            'email' => 'jovan@test.com',
            'email_verified_at' => now(),
            'password' => Hash::make('Jovan123'),
            'remember_token' => Str::random(10),
            'role_id' => '1'
        ]);
    }
}

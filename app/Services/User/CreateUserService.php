<?php

namespace App\Services\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreateUserService
{
    // Use the below only when  $currentUser = User::first();
    // public function handle(array $data): User

    // Use the below one always, but not during postman testing to avoid login everytime, the current user is first then
    public function handle(array $data, User $currentUser): User
    {

        // Use the below only when testing and not logged in, else default never use the next line
        // $currentUser = User::first();
        
        $newUser = User::create([

            'name' => $data['name'],

            'email' => $data['email'],

            'role_id' => $data['role_id'],

            'password' => Hash::make($data['password']),

            'organization_id' => $currentUser->organization_id,

        ]);

        return $newUser;
    }
}
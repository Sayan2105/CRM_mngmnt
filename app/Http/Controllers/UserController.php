<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\User\CreateUserService;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;

class UserController extends Controller
{
    //
    public function store(StoreUserRequest $request, CreateUserService $services){

        $user = $services->handle($request->validated(), auth()->user());

        return response()->json([
            'message' => 'User Created Successfully!',
            'user' => $user
        ]);
    }

    public function show(){

        $users = User::all();
        return response()->json($users);
    }
}

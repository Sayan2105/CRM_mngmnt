<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\User\CreateUserService;
use App\Services\User\DeleteUserService;
use App\Services\User\UpdateUserService;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;

class UserController extends Controller
{
    //
    public function store(StoreUserRequest $request, CreateUserService $services){

        $user = $services->handle($request->validated(), $request->user());

        return response()->json([
            'message' => 'User Created Successfully!',
            'user' => $user
        ]);
    }

    public function show(Request $request){

        $currentUser = $request->user();

        $users = User::where('organization_id', $currentUser->organization_id)->get();
        return response()->json($users);
    }

    public function delete(Request $request, int $user, DeleteUserService $service){
        $service->handle($user, $request->user());

        return response()->json([
            'message' => 'User Deleted Successfully!',
        ]);
    }

    public function update(UpdateUserRequest $request, int $user, UpdateUserService $service){
        $service->handle($user, $request->validated(), $request->user());

        return response()->json([
            'message' => 'User Updated Successfully!'
        ]);
    }
}

<?php

namespace App\Services\User;

use App\Models\User;

class UpdateUserService{

    public function handle(int $userId, array $data, User $currentUser): User {
        $user = User::where('organization_id', $currentUser->organization_id)->findOrFail($userId);

        $user->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'role_id' => $data['role_id']
        ]);

        return $user->fresh();
    }
}
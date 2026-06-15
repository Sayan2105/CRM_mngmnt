<?php

namespace App\Services\User;

use App\Models\User;

class DeleteUserService
{
    public function handle(int $userId, User $currentUser): void
    {
        $user = User::where('organization_id', $currentUser->organization_id)->findOrFail($userId);

        $user->delete();
    }
}

<?php

namespace App\Services\Organization;

use App\Models\Organization;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class CreateOrganizationService
{
    public function handle(array $data, User $user): Organization
    {
        return DB::transaction(function () use ($data, $user) {

            $organization = Organization::create([
                'name' => $data['name'],
                'slug' => $data['slug'],
                'owner_id' => $user->id,
                'email' => $data['email'] ?? null,
                'phone' => $data['phone'] ?? null,
            ]);

            // attach user to organization
            $user->organization_id = $organization->id;
            $user->save();

            return $organization;
        });
    }
}
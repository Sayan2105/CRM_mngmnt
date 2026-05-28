<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreOrganizationRequest;
use App\Services\Organization\CreateOrganizationService;

class OrganizationController extends Controller
{
    //
    public function store(StoreOrganizationRequest $req, CreateOrganizationService $service){

        $organization = $service->handle($req->validated(), auth()->user());

        return response()->json([
            'message' => 'Organization Created Successfully',
            'organization' => $organization
        ]);

    }
}

<?php

namespace App\Http\Controllers;

use Gate;
use App\Http\Resources\RoleResource;
use App\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        Gate::authorize('view', 'roles');

        return RoleResource::collection(Role::all());
    }

    public function show($id)
    {
        Gate::authorize('view', 'roles');

        return new RoleResource(Role::find($id));
    }
}

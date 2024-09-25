<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\PermissionRegistrar;
use App\Http\Requests\Admin\RolesStoreRequest;

class RolesAndPermissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RolesStoreRequest $request)
    {
        $data = $request->validated();
        $role = Role::create(['name' => $request->role, 'guard_name' => 'web'])->givePermissionTo($request->permissions);

        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        return $this->success([
            'role' => $role,
            'message' => 'New role permissions have been added successfully!'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($lang, string $id)
    {
        $role = Role::find($id);
        if (!$role) {
            return $this->error('', 'The role ID does not exist', 404);
        }

        $permissions = $role->permissions;

        // remove permissions from a role
        $role->revokePermissionTo($permissions);

        $role->delete();
        return $this->success([
            'message' => 'This role and its permissions have been deleted successfully!'
        ]);
    }
}

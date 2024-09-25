<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $arrayOfPermissionsNames = [
            'view users',
            'create users',
            'edit users',
            'delete users',
            'view roles',
            'create roles',
            'edit roles',
            'delete roles',
            'view products',
            'create products',
            'edit products',
            'delete products',
            'view orders',
            'create orders',
            'edit orders',
            'delete orders',
            'view categories',
            'create categories',
            'edit categories',
            'delete categories',
            'view reviews',
            'create reviews',
            'edit reviews',
            'delete reviews',
            'view discounts',
            'create discounts',
            'edit discounts',
            'delete discounts',
            'view settings',
            'edit settings',
        ];

        $permissions = collect($arrayOfPermissionsNames)->map(function ($permission) {
            return ['name' => $permission, 'guard_name' => 'web'];
        });

        // We arranged the permissions above then we're going to insert them into DB now!
        Permission::insert($permissions->toArray());

        // Giving all permission to Super admin
        $role= Role::create(['name'=>'super admin'])->givePermissionTo($arrayOfPermissionsNames);




    }
}

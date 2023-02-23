<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        //TODO: Create Permissions
        Permission::create(['name' => 'create appointment']);
        Permission::create(['name' => 'view appointment']);
        Permission::create(['name' => 'update appointment']);
        Permission::create(['name' => 'delete appointment']);
        Permission::create(['name' => 'approve appointment']);
        Permission::create(['name' => 'reject appointment']);

        Permission::create(['name' => 'create phone log']);
        Permission::create(['name' => 'update phone log']);

        Permission::create(['name' => 'create guest log']);
        Permission::create(['name' => 'view guest log']);

        //TODO: Assign Permissions into Roles
        $admin = Role::create(['name' => 'admin']);
        $admin->givePermissionTo('view appointment');
        $admin->givePermissionTo('update appointment');
        $admin->givePermissionTo('delete appointment');
        $admin->givePermissionTo('approve appointment');
        $admin->givePermissionTo('reject appointment');
        $admin->givePermissionTo('create phone log');

        $visitor = Role::create(['name' => 'visitor']);
        $visitor->givePermissionTo('create appointment');
        $visitor->givePermissionTo('view appointment');
        $visitor->givePermissionTo('create guest log');
        $visitor->givePermissionTo('view guest log');

        $superAdmin = Role::create(['name' => 'superior']);
    }
}

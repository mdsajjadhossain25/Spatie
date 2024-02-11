<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::create(['name' => 'admin']);
        $userRole = Role::create(['name' => 'user']);

        // Create permissions
        $editUsersPermission = Permission::create(['name' => 'edit users']);
        $deleteUsersPermission = Permission::create(['name' => 'delete users']);

        // Assign permissions to roles
        $adminRole->givePermissionTo($editUsersPermission, $deleteUsersPermission);
        $userRole->givePermissionTo($editUsersPermission);

        // Assign roles to users
        $adminUser = User::find(1); // Replace with your user instance
        $adminUser->assignRole('admin');

        $regularUser = User::find(2); // Replace with another user instance
        $regularUser->assignRole('user');
    }
}

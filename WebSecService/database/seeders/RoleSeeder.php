<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create permissions
        Permission::firstOrCreate(['name' => 'admin_users']);
        Permission::firstOrCreate(['name' => 'edit_users']);
        Permission::firstOrCreate(['name' => 'delete_users']);
        Permission::firstOrCreate(['name' => 'show_users']);
        Permission::firstOrCreate(['name' => 'manage_products']);
        Permission::firstOrCreate(['name' => 'view_customers']);
        Permission::firstOrCreate(['name' => 'manage_credit']);

        // Create roles
        $adminRole = Role::firstOrCreate(['name' => 'Admin']);
        $employeeRole = Role::firstOrCreate(['name' => 'Employee']);
        $customerRole = Role::firstOrCreate(['name' => 'Customer']);

        // Assign permissions to roles
        $adminRole->givePermissionTo(['admin_users', 'edit_users', 'delete_users', 'show_users', 'manage_products', 'view_customers', 'manage_credit']);
        $employeeRole->givePermissionTo(['manage_products', 'view_customers', 'manage_credit']);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     $superAdmin = Role::create([
            'guard_name' => 'sanctum',
            'name' => 'Super Admin'
        ]);
    $administrador = Role::create([
            'guard_name' => 'sanctum',
            'name' => 'administrador'
        ]);

        $permissions = [
            // Public User Permissions
            [
                'guard_name' => 'sanctum',
                'name' => 'public:user'
            ],
            // Dashboard Permissions
            [
                'guard_name' => 'sanctum',
                'name' => 'index:dashboard'
            ],
            // Branch Permissions
            [
                'guard_name' => 'sanctum',
                'name' => 'index:branch'
            ],
            [
                'guard_name' => 'sanctum',
                'name' => 'read:branch'
            ],
            [
                'guard_name' => 'sanctum',
                'name' => 'create:branch'
            ],
            [
                'guard_name' => 'sanctum',
                'name' => 'update:branch',
            ],
            [
                'guard_name' => 'sanctum',
                'name' => 'delete:branch'
            ],
            // Category Permissions
            [
                'guard_name' => 'sanctum',
                'name' => 'index:category'
            ],
            [
                'guard_name' => 'sanctum',
                'name' => 'read:category'
            ],
            [
                'guard_name' => 'sanctum',
                'name' => 'create:category'
            ],
            [
                'guard_name' => 'sanctum',
                'name' => 'update:category',
            ],
            [
                'guard_name' => 'sanctum',
                'name' => 'delete:category'
            ],
            // Payment Permissions
            [
                'guard_name' => 'sanctum',
                'name' => 'index:payment'
            ],
            [
                'guard_name' => 'sanctum',
                'name' => 'read:payment'
            ],
            [
                'guard_name' => 'sanctum',
                'name' => 'create:payment'
            ],
            [
                'guard_name' => 'sanctum',
                'name' => 'update:payment',
            ],
            [
                'guard_name' => 'sanctum',
                'name' => 'delete:payment'
            ],
            // Product Permissions
            [
                'guard_name' => 'sanctum',
                'name' => 'index:product'
            ],
            [
                'guard_name' => 'sanctum',
                'name' => 'read:product'
            ],
            [
                'guard_name' => 'sanctum',
                'name' => 'create:product'
            ],
            [
                'guard_name' => 'sanctum',
                'name' => 'update:product',
            ],
            [
                'guard_name' => 'sanctum',
                'name' => 'delete:product'
            ],
            // Profile Permissions
            [
                'guard_name' => 'sanctum',
                'name' => 'index:profile'
            ],
            [
                'guard_name' => 'sanctum',
                'name' => 'read:profile'
            ],
            [
                'guard_name' => 'sanctum',
                'name' => 'create:profile'
            ],
            [
                'guard_name' => 'sanctum',
                'name' => 'update:profile',
            ],
            [
                'guard_name' => 'sanctum',
                'name' => 'delete:profile'
            ],
            // Role Permissions
            [
                'guard_name' => 'sanctum',
                'name' => 'assign:permission'
            ],
            [
                'guard_name' => 'sanctum',
                'name' => 'index:permission'
            ],
            [
                'guard_name' => 'sanctum',
                'name' => 'read:permission'
            ],
            [
                'guard_name' => 'sanctum',
                'name' => 'create:permission'
            ],
            [
                'guard_name' => 'sanctum',
                'name' => 'update:permission',
            ],
            [
                'guard_name' => 'sanctum',
                'name' => 'delete:permission'
            ],
            // SocialNetwork Permissions
            [
                'guard_name' => 'sanctum',
                'name' => 'index:socialNetwork'
            ],
            [
                'guard_name' => 'sanctum',
                'name' => 'read:socialNetwork'
            ],
            [
                'guard_name' => 'sanctum',
                'name' => 'create:socialNetwork'
            ],
            [
                'guard_name' => 'sanctum',
                'name' => 'update:socialNetwork',
            ],
            [
                'guard_name' => 'sanctum',
                'name' => 'delete:socialNetwork'
            ],
            // Staff Permissions
            [
                'guard_name' => 'sanctum',
                'name' => 'admin:staff'
            ],
            [
                'guard_name' => 'sanctum',
                'name' => 'index:staff'
            ],
            [
                'guard_name' => 'sanctum',
                'name' => 'read:staff'
            ],
            [
                'guard_name' => 'sanctum',
                'name' => 'create:staff'
            ],
            [
                'guard_name' => 'sanctum',
                'name' => 'update:staff',
            ],
            [
                'guard_name' => 'sanctum',
                'name' => 'delete:staff'
            ],
            // Table Permissions
            [
                'guard_name' => 'sanctum',
                'name' => 'index:table'
            ],
            [
                'guard_name' => 'sanctum',
                'name' => 'read:table'
            ],
            [
                'guard_name' => 'sanctum',
                'name' => 'create:table'
            ],
            [
                'guard_name' => 'sanctum',
                'name' => 'update:table',
            ],
            [
                'guard_name' => 'sanctum',
                'name' => 'delete:table'
            ],
            // User Permissions 
            [
                'guard_name' => 'sanctum',
                'name' => 'index:user'
            ],
            [
                'guard_name' => 'sanctum',
                'name' => 'read:user'
            ],
            [
                'guard_name' => 'sanctum',
                'name' => 'create:user'
            ],
            [
                'guard_name' => 'sanctum',
                'name' => 'update:user',
            ],
            [
                'guard_name' => 'sanctum',
                'name' => 'delete:user'
            ],
        ];

        foreach ($permissions as $permission){
            Permission::create( $permission);
        }
        $superAdmin->givePermissionTo([
            'index:dashboard', 
            'index:branch', 
            'index:staff',
            'index:category',
            'index:permission',
            'index:user'
        ]);
        $administrador->givePermissionTo([
            'index:dashboard',
            // BRANCH 
            'index:branch',
            'read:branch',
            'create:branch',
            'update:branch',
            'delete:branch', 
            // STAFF
            'index:staff',
            'admin:staff',
            // CATEGORY
            'index:category',
            'read:category',
            'create:category',
            'update:category',
            'delete:category',
            // PERMISSION
            'index:permission',
            'read:permission',
            'assign:permission',
            // TABLE
            'index:table',
            'read:table',
            'create:table',
            'update:table',
            'delete:table',
            // PRODUCT
            'index:product',
            'read:product',
            'create:product',
            'update:product',
            'delete:product',
            // PAYMENT
            'index:payment',
            'read:payment',
            'create:payment',
            'update:payment',
            'delete:payment',
        ]);
    }
}

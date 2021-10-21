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
        Role::create([
            'guard_name' => 'sanctum',
            'name' => 'super:admin'
        ]);

        $permissions = [
            // Permiso visual Super Admin
            [
                'guard_name' => 'sanctum',
                'name' => 'jklr'
            ],
            // Menu Permissions
            [
                'guard_name' => 'sanctum',
                'name' => 'administracion'
            ],
            // Public User Permissions
            [
                'guard_name' => 'sanctum',
                'name' => 'public:user'
            ],
            // Dashboard Permissions
            [
                'guard_name' => 'sanctum',
                'name' => 'view:dashboard'
            ],
            // Branch Permissions
            [
                'guard_name' => 'sanctum',
                'name' => 'view:branch'
            ],
            [
                'guard_name' => 'sanctum',
                'name' => 'show:branch'
            ],
            [
                'guard_name' => 'sanctum',
                'name' => 'create:branch'
            ],
            [
                'guard_name' => 'sanctum',
                'name' => 'edit:branch',
            ],
            [
                'guard_name' => 'sanctum',
                'name' => 'delete:branch'
            ],
            // Category Permissions
            [
                'guard_name' => 'sanctum',
                'name' => 'view:category'
            ],
            [
                'guard_name' => 'sanctum',
                'name' => 'show:category'
            ],
            [
                'guard_name' => 'sanctum',
                'name' => 'create:category'
            ],
            [
                'guard_name' => 'sanctum',
                'name' => 'edit:category',
            ],
            [
                'guard_name' => 'sanctum',
                'name' => 'delete:category'
            ],
            // Payment Permissions
            [
                'guard_name' => 'sanctum',
                'name' => 'view:payment'
            ],
            [
                'guard_name' => 'sanctum',
                'name' => 'show:payment'
            ],
            [
                'guard_name' => 'sanctum',
                'name' => 'create:payment'
            ],
            [
                'guard_name' => 'sanctum',
                'name' => 'edit:payment',
            ],
            [
                'guard_name' => 'sanctum',
                'name' => 'delete:payment'
            ],
            // Product Permissions
            [
                'guard_name' => 'sanctum',
                'name' => 'view:product'
            ],
            [
                'guard_name' => 'sanctum',
                'name' => 'show:product'
            ],
            [
                'guard_name' => 'sanctum',
                'name' => 'create:product'
            ],
            [
                'guard_name' => 'sanctum',
                'name' => 'edit:product',
            ],
            [
                'guard_name' => 'sanctum',
                'name' => 'delete:product'
            ],
            // Profile Permissions
            [
                'guard_name' => 'sanctum',
                'name' => 'view:profile'
            ],
            [
                'guard_name' => 'sanctum',
                'name' => 'show:profile'
            ],
            [
                'guard_name' => 'sanctum',
                'name' => 'create:profile'
            ],
            [
                'guard_name' => 'sanctum',
                'name' => 'edit:profile',
            ],
            [
                'guard_name' => 'sanctum',
                'name' => 'delete:profile'
            ],
            // Role Permissions
            [
                'guard_name' => 'sanctum',
                'name' => 'view:role'
            ],
            [
                'guard_name' => 'sanctum',
                'name' => 'show:role'
            ],
            [
                'guard_name' => 'sanctum',
                'name' => 'create:role'
            ],
            [
                'guard_name' => 'sanctum',
                'name' => 'edit:role',
            ],
            [
                'guard_name' => 'sanctum',
                'name' => 'delete:role'
            ],
            // SocialNetwork Permissions
            [
                'guard_name' => 'sanctum',
                'name' => 'view:socialNetwork'
            ],
            [
                'guard_name' => 'sanctum',
                'name' => 'show:socialNetwork'
            ],
            [
                'guard_name' => 'sanctum',
                'name' => 'create:socialNetwork'
            ],
            [
                'guard_name' => 'sanctum',
                'name' => 'edit:socialNetwork',
            ],
            [
                'guard_name' => 'sanctum',
                'name' => 'delete:socialNetwork'
            ],
            // Staff Permissions
            [
                'guard_name' => 'sanctum',
                'name' => 'view:staff'
            ],
            [
                'guard_name' => 'sanctum',
                'name' => 'show:staff'
            ],
            [
                'guard_name' => 'sanctum',
                'name' => 'create:staff'
            ],
            [
                'guard_name' => 'sanctum',
                'name' => 'edit:staff',
            ],
            [
                'guard_name' => 'sanctum',
                'name' => 'delete:staff'
            ],
            // Table Permissions
            [
                'guard_name' => 'sanctum',
                'name' => 'view:table'
            ],
            [
                'guard_name' => 'sanctum',
                'name' => 'show:table'
            ],
            [
                'guard_name' => 'sanctum',
                'name' => 'create:table'
            ],
            [
                'guard_name' => 'sanctum',
                'name' => 'edit:table',
            ],
            [
                'guard_name' => 'sanctum',
                'name' => 'delete:table'
            ],
            // User Permissions
            [
                'guard_name' => 'sanctum',
                'name' => 'view:user'
            ],
            [
                'guard_name' => 'sanctum',
                'name' => 'show:user'
            ],
            [
                'guard_name' => 'sanctum',
                'name' => 'create:user'
            ],
            [
                'guard_name' => 'sanctum',
                'name' => 'edit:user',
            ],
            [
                'guard_name' => 'sanctum',
                'name' => 'delete:user'
            ],
        ];

        foreach ($permissions as $permission){
            Permission::create( $permission);
        }
    }
}

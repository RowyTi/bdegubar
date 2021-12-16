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
            'name' => 'Administrador'
        ]);
        $encargado = Role::create([
            'guard_name' => 'sanctum',
            'name' => 'Encargado'
        ]);
        $cocina = Role::create([
            'guard_name' => 'sanctum',
            'name' => 'Cocina'
        ]);
        $mozo = Role::create([
            'guard_name' => 'sanctum',
            'name' => 'Mozo'
        ]);
        $staff = Role::create([
            'guard_name'=> 'sanctum',
            'name' => 'Staff'
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
                'name' => 'dashboard'
            ],
            // Customer Permissions
            [
                'guard_name' => 'sanctum',
                'name' => 'dashboard:customer'
            ],
            [
                'guard_name' => 'sanctum',
                'name' => 'index:customer'
            ],
            [
                'guard_name' => 'sanctum',
                'name' => 'read:customer'
            ],
            [
                'guard_name' => 'sanctum',
                'name' => 'create:customer'
            ],
            [
                'guard_name' => 'sanctum',
                'name' => 'update:customer',
            ],
            [
                'guard_name' => 'sanctum',
                'name' => 'delete:customer'
            ],
            // Branch Permissions
            [
                'guard_name' => 'sanctum',
                'name' => 'dashboard:branch'
            ],
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
                'name' => 'dashboard:category'
            ],
            [
                'guard_name' => 'sanctum',
                'name' => 'dashboard:assign-category'
            ],
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
                'name' => 'dashboard:payment'
            ],
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
                'name' => 'dashboard:product'
            ],
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
                'name' => 'dashboard:profile'
            ],
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
                'name' => 'dashboard:permission'
            ],
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
                'name' => 'dashboard:socialNetwork'
            ],
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
                'name' => 'dashboard:staff'
            ],
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
                'name' => 'dashboard:table'
            ],
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
                'name' => 'dashboard:user'
            ],
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
            // ORDERS PERMISSION
            [
                'guard_name' => 'sanctum',
                'name' => 'dashboard:order'
            ],
            [
                'guard_name' => 'sanctum',
                'name' => 'index:order'
            ],
            [
                'guard_name' => 'sanctum',
                'name' => 'read:order'
            ],
            [
                'guard_name' => 'sanctum',
                'name' => 'create:order'
            ],
            [
                'guard_name' => 'sanctum',
                'name' => 'update:order',
            ],
            [
                'guard_name' => 'sanctum',
                'name' => 'delete:order'
            ],
                // KITCHEN PERMISSION
            [
                'guard_name' => 'sanctum',
                'name' => 'dashboard:kitchen'
            ],
        ];

        foreach ($permissions as $permission){
            Permission::create( $permission);
        }
        $superAdmin->givePermissionTo([
            'dashboard',
            'dashboard:customer',
            'dashboard:staff',
            'dashboard:category',
            'dashboard:permission',
            'dashboard:user',
        ]);
        $administrador->givePermissionTo([
            'dashboard',
            // BRANCH
            'dashboard:branch',
            'index:branch',
            'read:branch',
            'update:branch',
            // STAFF
            'dashboard:staff',
            'index:staff',
            'admin:staff',
            // CATEGORY
            'dashboard:assign-category',
            'index:category',
            'read:category',
            'update:category',
            // PERMISSION
            'dashboard:permission',
            'index:permission',
            'read:permission',
            'assign:permission',
            // TABLE
            'dashboard:table',
            'index:table',
            'read:table',
            'create:table',
            'update:table',
            'delete:table',
            // PRODUCT
            'dashboard:product',
            'index:product',
            'read:product',
            'create:product',
            'update:product',
            'delete:product',
            // PAYMENT
            'dashboard:payment',
            'index:payment',
            'read:payment',
            'create:payment',
            'update:payment',
            'delete:payment',
            // PROFILE
            'dashboard:profile',
            'read:profile',
            'update:profile',
            // ORDER
            'dashboard:order',
            'index:order',
            'read:order',
            'create:order',
            'update:order',
            'delete:order',
        ]);
        $encargado->givePermissionTo([
            'dashboard',
            // BRANCH
            'dashboard:branch',
            'index:branch',
            'read:branch',
            // STAFF
            'dashboard:staff',
            'index:staff',
            'read:staff',
            // TABLE
            'dashboard:table',
            'index:table',
            'read:table',
            'create:table',
            'update:table',
            // PRODUCT
            'dashboard:product',
            'index:product',
            'read:product',
            'update:product',
            // PROFILE
            'dashboard:profile',
            'read:profile',
            'update:profile',
            // ORDER
            'dashboard:order',
            'index:order',
            'read:order',
            'update:order',
        ]);
        $cocina->givePermissionTo([
            'dashboard',
            // PROFILE
            'dashboard:profile',
            'read:profile',
            'update:profile',
            // ORDER
            'dashboard:kitchen',
            'index:order',
            'read:order',
            'update:order',
        ]);
        $mozo->givePermissionTo([
            // TABLE
            'index:table',
            'read:table',
            'update:table',
            // PROFILE
            'dashboard:profile',
            'read:profile',
            'update:profile'
        ]);
        $staff->givePermissionTo([
            'dashboard',
            // PROFILE
            'dashboard:profile',
            'read:profile',
            'update:profile'
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions for inventory management system
        $permissions = [
            // User Management
            'view users',
            'create users',
            'edit users',
            'delete users',
            'assign roles',

            // Product Management
            'view products',
            'create products',
            'edit products',
            'delete products',
            'manage product categories',

            // Inventory Management
            'view inventory',
            'update inventory',
            'adjust inventory',
            'view inventory history',
            'manage stock levels',
            'set reorder points',
            'view stock levels',

            // Purchase Orders
            'view purchase orders',
            'create purchase orders',
            'edit purchase orders',
            'delete purchase orders',
            'approve purchase orders',
            'receive purchase orders',

            // Sales Orders
            'view sales orders',
            'create sales orders',
            'edit sales orders',
            'delete sales orders',
            'process sales orders',
            'view sales reports',

            // Suppliers
            'view suppliers',
            'create suppliers',
            'edit suppliers',
            'delete suppliers',
            'manage supplier contacts',

            // Customers
            'view customers',
            'create customers',
            'edit customers',
            'delete customers',
            'manage customer contacts',

            // Reports
            'view reports',
            'export reports',
            'view analytics',
            'view dashboard',

            // System Settings
            'manage settings',
            'manage roles',
            'manage permissions',
            'view audit logs',
            'backup data',
            'restore data',

            // Warehouse Management
            'manage warehouses',
            'view warehouse locations',
            'manage locations',
            'view location inventory',

            // Notifications
            'manage notifications',
            'view notifications',
            'send notifications',
        ];

        // Create permissions
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Update cache to know about the newly created permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create roles and assign permissions

        // Super Admin - Has all permissions
        $superAdmin = Role::create(['name' => 'superadmin']);
        $superAdmin->givePermissionTo(Permission::all());

        // Admin - Most permissions except some system-level ones
        $admin = Role::create(['name' => 'admin']);
        $admin->givePermissionTo([
            'view users', 'create users', 'edit users', 'assign roles',
            'view products', 'create products', 'edit products', 'delete products', 'manage product categories',
            'view inventory', 'update inventory', 'adjust inventory', 'view inventory history', 'manage stock levels', 'set reorder points',
            'view purchase orders', 'create purchase orders', 'edit purchase orders', 'delete purchase orders', 'approve purchase orders', 'receive purchase orders',
            'view sales orders', 'create sales orders', 'edit sales orders', 'delete sales orders', 'process sales orders', 'view sales reports',
            'view suppliers', 'create suppliers', 'edit suppliers', 'delete suppliers', 'manage supplier contacts',
            'view customers', 'create customers', 'edit customers', 'delete customers', 'manage customer contacts',
            'view reports', 'export reports', 'view analytics', 'view dashboard',
            'manage settings', 'view audit logs',
            'manage warehouses', 'view warehouse locations', 'manage locations', 'view location inventory',
            'manage notifications', 'view notifications', 'send notifications',
        ]);

        // Salesperson - Sales and customer focused permissions
        $salesperson = Role::create(['name' => 'salesperson']);
        $salesperson->givePermissionTo([
            'view products', 'view inventory', 'view stock levels',
            'view sales orders', 'create sales orders', 'edit sales orders', 'process sales orders', 'view sales reports',
            'view customers', 'create customers', 'edit customers', 'manage customer contacts',
            'view reports', 'export reports', 'view dashboard',
            'view notifications',
        ]);

        // Viewer - Read-only access
        $viewer = Role::create(['name' => 'viewer']);
        $viewer->givePermissionTo([
            'view products', 'view inventory', 'view stock levels',
            'view sales orders', 'view sales reports',
            'view customers',
            'view reports', 'view dashboard',
            'view notifications',
        ]);
    }
}

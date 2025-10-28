<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create users for each role
        $roles = ['superadmin', 'admin', 'salesperson', 'viewer'];
        
        foreach ($roles as $roleName) {
            $role = Role::where('name', $roleName)->first();
            
            if ($role) {
                $user = User::create([
                    'name' => ucfirst($roleName),
                    'email' => $roleName . '@inventory.com',
                    'password' => Hash::make('password'),
                    'email_verified_at' => now(),
                ]);
                
                $user->assignRole($role);
                
                $this->command->info("Created {$roleName} user: {$user->email}");
            } else {
                $this->command->warn("Role '{$roleName}' not found. Make sure to run PermissionsSeeder first.");
            }
        }
    }
}
<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RolesAndUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Roles
        $adminRole = Role::create(['name' => 'admin']);
        $workerRole = Role::create(['name' => 'worker']);
        $userRole = Role::create(['name' => 'user']);

        // Create Admin User
        $admin = User::create([
            'email' => 'admin@example.com',
            'name' => 'Admin',
            'password' => Hash::make('password'), // You can change this
            'image' => 'assets/images/admin.jpg'
        ]);

        $admin->assignRole($adminRole);


        $worker = User::create([
            'email' => 'worker@example.com',
            'name' => 'Worker',
            'password' => Hash::make('password'), // You can change this
            'price' => 99,
            'position_id' => 1,
            'location_id' => 1,
            'image' => 'assets/images/worker.jpg'
        ]);
        $worker->assignRole($workerRole);

        // Create Worker User
        $user = User::create([
            'email' => 'user@example.com',
            'name' => 'user',
            'password' => Hash::make('password'),
            'image' => 'assets/images/person.png'
        ]);
        $user->assignRole($userRole);
    }
}

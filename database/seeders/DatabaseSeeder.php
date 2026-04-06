<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Location;
use App\Models\Position;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $locations = ['Alicante','Valencia'];
        foreach ($locations as $location) {
            Location::create(['name' => $location]);
        }
        $positions = ['electrician','plumber','locksmith','gerdener','painter'];
        foreach ($positions as $position) {
            Position::create(['name' => $position]);
        }
        $this->call(RolesAndUsersSeeder::class);

    }
}

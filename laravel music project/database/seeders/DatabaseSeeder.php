<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

   
    public function run(): void
    {
       
        $this->call(RolePermissionSeeder::class);

      
        $superAdmin = User::factory()->create([
            'name' => 'Studio Master',
            'email' => 'master@musichub.kz',
            'password' => bcrypt('password'),
        ]);
        $superAdmin->assignRole('super-admin');

        $admin = User::factory()->create([
            'name' => 'Admin Artist',
            'email' => 'admin@musichub.kz',
            'password' => bcrypt('password'),
        ]);
        $admin->assignRole('admin');

        $moderator = User::factory()->create([
            'name' => 'Studio Moderator',
            'email' => 'moderator@musichub.kz',
            'password' => bcrypt('password'),
        ]);
        $moderator->assignRole('moderator');

        $user = User::factory()->create([
            'name' => 'Music Artist',
            'email' => 'artist@musichub.kz',
            'password' => bcrypt('password'),
        ]);
        $user->assignRole('user');
    }
}


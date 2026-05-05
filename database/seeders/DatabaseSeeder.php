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

        // Super Admin
        $superAdmin = User::updateOrCreate(
            ['email' => 'master@musichub.kz'],
            [
                'name' => 'Studio Master',
                'password' => bcrypt('password'),
            ]
        );
        $superAdmin->syncRoles(['super-admin']);

        // Admin
        $admin = User::updateOrCreate(
            ['email' => 'admin@musichub.kz'],
            [
                'name' => 'Admin Artist',
                'password' => bcrypt('password'),
            ]
        );
        $admin->syncRoles(['admin']);

        // Moderator
        $moderator = User::updateOrCreate(
            ['email' => 'moderator@musichub.kz'],
            [
                'name' => 'Studio Moderator',
                'password' => bcrypt('password'),
            ]
        );
        $moderator->syncRoles(['moderator']);

        // Music Artist
        $user = User::updateOrCreate(
            ['email' => 'artist@musichub.kz'],
            [
                'name' => 'Music Artist',
                'password' => bcrypt('password'),
            ]
        );
        $user->syncRoles(['user']);
    }
}


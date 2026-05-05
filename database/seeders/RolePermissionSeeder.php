<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
     
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

      
        Permission::firstOrCreate(['name' => 'create music-tracks']);
        Permission::firstOrCreate(['name' => 'edit music-tracks']);
        Permission::firstOrCreate(['name' => 'delete music-tracks']);
        Permission::firstOrCreate(['name' => 'publish music-tracks']);
        Permission::firstOrCreate(['name' => 'view music-tracks']);

        Permission::firstOrCreate(['name' => 'create music-news']);
        Permission::firstOrCreate(['name' => 'edit music-news']);
        Permission::firstOrCreate(['name' => 'delete music-news']);
        Permission::firstOrCreate(['name' => 'publish music-news']);
        Permission::firstOrCreate(['name' => 'view music-news']);

        Permission::firstOrCreate(['name' => 'create records']);
        Permission::firstOrCreate(['name' => 'edit records']);
        Permission::firstOrCreate(['name' => 'delete records']);
        Permission::firstOrCreate(['name' => 'view records']);

        Permission::firstOrCreate(['name' => 'manage users']);
        Permission::firstOrCreate(['name' => 'manage roles']);
        Permission::firstOrCreate(['name' => 'view analytics']);
        Permission::firstOrCreate(['name' => 'manage settings']);

        $superAdmin = Role::firstOrCreate(['name' => 'super-admin']);
        $superAdmin->syncPermissions(Permission::all());

        $admin = Role::firstOrCreate(['name' => 'admin']);
        $admin->syncPermissions([
            'create music-tracks',
            'edit music-tracks',
            'delete music-tracks',
            'publish music-tracks',
            'view music-tracks',
            'create music-news',
            'edit music-news',
            'delete music-news',
            'publish music-news',
            'view music-news',
            'create records',
            'edit records',
            'delete records',
            'view records',
            'view analytics',
        ]);

        $moderator = Role::firstOrCreate(['name' => 'moderator']);
        $moderator->syncPermissions([
            'create music-tracks',
            'edit music-tracks',
            'publish music-tracks',
            'view music-tracks',
            'create music-news',
            'edit music-news',
            'publish music-news',
            'view music-news',
            'create records',
            'edit records',
            'view records',
        ]);

        $user = Role::firstOrCreate(['name' => 'user']);
        $user->syncPermissions([
            'view music-tracks',
            'view music-news',
            'create records',
            'view records',
        ]);
    }
}


<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
     $adminRole = Role::create(['name' => 'admin']);
     $userRole = Role::create(['name' => 'user']);

     Permission::create(['name' => 'create products']);
     Permission::create(['name' => 'edit products']);
     Permission::create(['name' => 'delete products']);
     Permission::create(['name' => 'view products']);

     $adminRole->givePermissionTo('create products', 'edit products', 'delete products', 'view products');
     $userRole->givePermissionTo('view products');
    }
}

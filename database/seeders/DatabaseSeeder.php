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

     Permission::create(['name' => 'product.index']);
     Permission::create(['name' => 'product.create']);
     Permission::create(['name' => 'product.edit']);
     Permission::create(['name' => 'product.destroy']);

    }
}

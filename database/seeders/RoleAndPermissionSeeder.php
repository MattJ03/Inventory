<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
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

<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'seguridad']);

        Permission::create(['name' => 'permissions.index']);
        Permission::create(['name' => 'permissions.create']);
        Permission::create(['name' => 'permissions.delete']);
        Permission::create(['name' => 'permissions.updated']);
        Permission::create(['name' => 'permissions.getPaginate']);

        Permission::create(['name' => 'roles.index']);
        Permission::create(['name' => 'roles.create']);
        Permission::create(['name' => 'roles.delete']);
        Permission::create(['name' => 'roles.updated']);
        Permission::create(['name' => 'roles.getPaginate']);

        Permission::create(['name' => 'logs.index']);
        Permission::create(['name' => 'logs.getPaginate']);

        //usuarios

        Permission::create(['name' => 'users.index']);
        Permission::create(['name' => 'users.create']);
        Permission::create(['name' => 'users.delete']);
        Permission::create(['name' => 'users.updated']);
        Permission::create(['name' => 'users.getPaginate']);

        Permission::create(['name' => 'configuracion']);

        Permission::create(['name' => 'category.index']);
        Permission::create(['name' => 'category.create']);
        Permission::create(['name' => 'category.delete']);
        Permission::create(['name' => 'category.updated']);
        Permission::create(['name' => 'category.getPaginate']);

        Permission::create(['name' => 'subcategory.index']);
        Permission::create(['name' => 'subcategory.create']);
        Permission::create(['name' => 'subcategory.delete']);
        Permission::create(['name' => 'subcategory.updated']);
        Permission::create(['name' => 'subcategory.getPaginate']);

        Permission::create(['name' => 'coin.index']);
        Permission::create(['name' => 'coin.create']);
        Permission::create(['name' => 'coin.delete']);
        Permission::create(['name' => 'coin.updated']);
        Permission::create(['name' => 'coin.getPaginate']);

        Permission::create(['name' => 'product.index']);
        Permission::create(['name' => 'product.create']);
        Permission::create(['name' => 'product.delete']);
        Permission::create(['name' => 'product.updated']);
        Permission::create(['name' => 'product.getPaginate']);

        Permission::create(['name' => 'order']);

        Permission::create(['name' => 'order.index']);
        Permission::create(['name' => 'order.create']);
        Permission::create(['name' => 'order.delete']);
        Permission::create(['name' => 'order.updated']);
        Permission::create(['name' => 'order.getPaginate']);




    }
}

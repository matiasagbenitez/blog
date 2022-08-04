<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $role1 = Role::create(['name' => 'admin']);
        $role2 = Role::create(['name' => 'blogger']);

        Permission::create(['name' => 'admin.home'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'admin.categories.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.categories.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.categories.edit'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.categories.delete'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'admin.tags.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.tags.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.tags.edit'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.tags.delete'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'admin.posts.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.posts.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.posts.edit'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.posts.delete'])->syncRoles([$role1, $role2]);



    }
}

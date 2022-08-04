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

        Permission::create(['name' => 'admin.home', 'description' => 'Dashboard'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'admin.users.index', 'description' => 'See list of users'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.users.edit', 'description' => 'Edit roles of users'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.roles.index', 'description' => 'See list of roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.roles.create', 'description' => 'Create a new role'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.roles.edit', 'description' => 'Edit an existing role'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.roles.delete', 'description' => 'Delete an existing role'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.categories.index', 'description' => 'See list of categories'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.categories.create', 'description' => 'Create a new category'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.categories.edit', 'description' => 'Edit an existing category'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.categories.delete', 'description' => 'Delete an existing category'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.tags.index', 'description' => 'See list of tags'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.tags.create', 'description' => 'Create a new tag'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.tags.edit', 'description' => 'Edit an existing tag'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.tags.delete', 'description' => 'Delete an existing tag'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.posts.index', 'description' => 'See list of posts'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.posts.create', 'description' => 'Create a new post'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.posts.edit', 'description' => 'Edit an existing post'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.posts.delete', 'description' => 'Delete an existing post'])->syncRoles([$role1, $role2]);

    }
}

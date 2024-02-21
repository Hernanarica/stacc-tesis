<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'all']);
        Permission::create(['name' => 'upload local']);
        //		Permission::create(['name' => 'watch']);

        //		Admin
        $roleAdmin = Role::create(['name' => 'admin']);
        $roleAdmin->givePermissionTo('all');

        //		Owner
        $roleOwner = Role::create(['name' => 'owner']);
        $roleOwner->givePermissionTo('upload local');

        //		Visitor
        $roleVisitor = Role::create(['name' => 'visitor']);
    }
}

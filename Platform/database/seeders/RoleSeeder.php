<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
//use Spatie\Permission\Contracts\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::Create(['name' => 'Admin']);
        $role2 = Role::Create(['name' => 'Medico']);
        $role3 = Role::Create(['name' => 'Asistente']);
        $role4 = Role::Create(['name' => 'Operador']);

        Permission::create(['name' => 'admin.index'])->syncRoles([$role1,$role2]);

        Permission::create(['name' => 'hcitas.index'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'hcitas.store'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'hcitas.create'])->syncRoles([$role1,$role2]);


    }
}

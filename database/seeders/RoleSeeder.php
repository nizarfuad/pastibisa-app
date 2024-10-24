<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name'=>'tambah-user']);
        Permission::create(['name'=>'edit-user']);
        Permission::create(['name'=>'hapus-user']);
        Permission::create(['name'=>'lihat-user']);

        Permission::create(['name'=>'tambah-keuangan']);
        Permission::create(['name'=>'edit-keuangan']);
        Permission::create(['name'=>'hapus-keuangan']);
        Permission::create(['name'=>'lihat-keuangan']);

        Permission::create(['name'=>'tambah-nota']);
        Permission::create(['name'=>'edit-nota']);
        Permission::create(['name'=>'hapus-nota']);
        Permission::create(['name'=>'lihat-nota']);

        Role::create(['name'=>'master']);
        Role::create(['name'=>'ph']);
        Role::create(['name'=>'crew']);

        $roleMaster = Role::findByName('master');
        $roleMaster->givePermissionTo('tambah-user');
        $roleMaster->givePermissionTo('edit-user');
        $roleMaster->givePermissionTo('hapus-user');
        $roleMaster->givePermissionTo('lihat-user');

        $rolePh = Role::findByName('ph');
        $rolePh->givePermissionTo('tambah-keuangan');
        $rolePh->givePermissionTo('edit-keuangan');
        $rolePh->givePermissionTo('hapus-keuangan');
        $rolePh->givePermissionTo('lihat-keuangan');

        $roleCrew = Role::findByName('crew');
        $roleCrew->givePermissionTo('tambah-nota');
        $roleCrew->givePermissionTo('edit-nota');
        $roleCrew->givePermissionTo('hapus-nota');
        $roleCrew->givePermissionTo('lihat-nota');

    }
}

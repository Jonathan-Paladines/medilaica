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
        // Verificar y crear roles si no existen
        //$role1 = Role::firstOrCreate(['name' => 'Admin']);
        //$role2 = Role::firstOrCreate(['name' => 'Doctor']);
        //$role3 = Role::firstOrCreate(['name' => 'Enfermera']);

        // Crear permisos (también puedes usar firstOrCreate si necesitas evitar duplicados)
        //Permission::firstOrCreate(['name' => 'dashboard']);
        //Permission::firstOrCreate(['name' => 'crear pacientes']);
        //Permission::firstOrCreate(['name' => 'editar pacientes']);
        //Permission::firstOrCreate(['name' => 'eliminar pacientes']);
        //Permission::firstOrCreate(['name' => 'ver pacientes']);

        // Asignar permisos a roles
        //$admin->givePermissionTo(['dashboard', 'crear pacientes', 'editar pacientes', 'eliminar pacientes', 'ver pacientes']);
        //$doctor->givePermissionTo(['dashboard', 'ver pacientes']);
        //$nurse->givePermissionTo(['ver pacientes']);

        // Verificar y crear roles si no existen
        $admin = Role::firstOrCreate(['name' => 'Admin']);
        $doctor = Role::firstOrCreate(['name' => 'Doctor']);
        $nurse = Role::firstOrCreate(['name' => 'Enfermera']);

        // Crear permisos (también puedes usar firstOrCreate si necesitas evitar duplicados)
        $dashboard = Permission::firstOrCreate(['name' => 'dashboard']);
        $crearPacientes = Permission::firstOrCreate(['name' => 'crear pacientes']);
        $editarPacientes = Permission::firstOrCreate(['name' => 'editar pacientes']);
        $eliminarPacientes = Permission::firstOrCreate(['name' => 'eliminar pacientes']);
        $verPacientes = Permission::firstOrCreate(['name' => 'ver pacientes']);

        // Asignar permisos a roles
        $admin->givePermissionTo([$dashboard, $crearPacientes, $editarPacientes, $eliminarPacientes, $verPacientes]);
        $doctor->givePermissionTo([$dashboard, $verPacientes]);
        $nurse->givePermissionTo([$verPacientes]);
    }
}

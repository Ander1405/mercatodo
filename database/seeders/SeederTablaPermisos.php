<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

//Spatie
use Spatie\Permission\Models\Permission;

class SeederTablaPermisos extends Seeder
{
    public function run(): void
    {
        $permisos = [
            // Tabla Roles
            'ver-rol',
            'crear-rol',
            'editar-rol',
            'borrar-rol',

            // Usuarios
            'ver-usuario',
            'crear-usuario',
            'editar-usuario',
            'borrar-usuario',

            // Productos
            'ver-producto',
            'crear-producto',
            'editar-producto',
            'borrar-producto',

            //Historial de transacciones
            'ver-historial',

        ];
        foreach ($permisos as $permiso){
            Permission::create(['name'=>$permiso]);
        }
    }
}

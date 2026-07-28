<?php

namespace Database\Seeders;

use App\Models\Rol;
use App\Models\Usuario;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    public function run(): void
    {
        $rolSuperadmin = Rol::where('nombre', 'superadmin')->first();

        Usuario::create([
            'nombre' => 'Alexis',
            'apellido' => 'Admin',
            'email' => 'admin@demo.test',
            'password' => Hash::make('password'), // cambiar en producción
            'confirmado' => true,
            'rol_id' => $rolSuperadmin->id,
            'created_at' => now(),
        ]);
    }
}

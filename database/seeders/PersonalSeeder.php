<?php

namespace Database\Seeders;

use App\Models\Cargo;
use App\Models\Personal;
use Illuminate\Database\Seeder;

class PersonalSeeder extends Seeder
{
    public function run(): void
    {
        $equipo = [
            ['nombre' => 'Carla', 'apellido' => 'Mendoza', 'cargo' => 'Gerente General', 'email' => 'carla@inmobiliariademo.pe'],
            ['nombre' => 'Jorge', 'apellido' => 'Rios', 'cargo' => 'Asesor Comercial', 'email' => 'jorge@inmobiliariademo.pe'],
            ['nombre' => 'Lucia', 'apellido' => 'Fernandez', 'cargo' => 'Asesor Legal', 'email' => 'lucia@inmobiliariademo.pe'],
        ];

        foreach ($equipo as $i => $persona) {
            $cargo = Cargo::where('nombre', $persona['cargo'])->first();

            Personal::create([
                'nombre' => $persona['nombre'],
                'apellido' => $persona['apellido'],
                'email' => $persona['email'],
                'telefono' => '+51 9' . rand(10000000, 99999999),
                'imagen' => 'equipo-demo-' . ($i + 1) . '.jpg',
                'cargo_id' => $cargo->id,
                'orden' => $i,
                'activo' => true,
            ]);
        }
    }
}

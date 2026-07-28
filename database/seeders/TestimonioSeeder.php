<?php

namespace Database\Seeders;

use App\Models\Testimonio;
use Illuminate\Database\Seeder;

class TestimonioSeeder extends Seeder
{
    public function run(): void
    {
        $testimonios = [
            [
                'nombre_cliente' => 'Roberto Chavez',
                'cargo_empresa' => 'Gerente, Distribuidora Norte',
                'contenido' => 'Encontramos el local ideal para nuestra tienda en menos de dos semanas. El equipo fue muy profesional en todo el proceso.',
                'calificacion' => 5,
            ],
            [
                'nombre_cliente' => 'Maria Elena Torres',
                'cargo_empresa' => 'Propietaria',
                'contenido' => 'Vendieron mi local comercial al mejor precio del mercado. Excelente asesoría legal durante todo el trámite.',
                'calificacion' => 5,
            ],
            [
                'nombre_cliente' => 'Diego Salazar',
                'cargo_empresa' => 'CEO, Salazar Logística',
                'contenido' => 'Alquilamos un almacén perfecto para nuestra operación. Muy buena comunicación y seguimiento post-contrato.',
                'calificacion' => 4,
            ],
        ];

        foreach ($testimonios as $i => $testimonio) {
            Testimonio::create([
                'nombre_cliente' => $testimonio['nombre_cliente'],
                'cargo_empresa' => $testimonio['cargo_empresa'],
                'contenido' => $testimonio['contenido'],
                'calificacion' => $testimonio['calificacion'],
                'visible' => true,
                'orden' => $i,
                'created_at' => now(),
            ]);
        }
    }
}

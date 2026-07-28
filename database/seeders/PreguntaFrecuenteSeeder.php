<?php

namespace Database\Seeders;

use App\Models\PreguntaFrecuente;
use Illuminate\Database\Seeder;

class PreguntaFrecuenteSeeder extends Seeder
{
    public function run(): void
    {
        $preguntas = [
            [
                'pregunta' => '¿Cuánto tiempo toma vender o alquilar una propiedad?',
                'respuesta' => 'Depende de la zona y el tipo de propiedad, pero en promedio nuestros clientes cierran una operación entre 2 y 6 semanas.',
            ],
            [
                'pregunta' => '¿Cobran comisión por asesoría legal?',
                'respuesta' => 'La asesoría legal básica está incluida en el servicio de venta o alquiler. Trámites adicionales se cotizan por separado.',
            ],
            [
                'pregunta' => '¿Trabajan con propiedades fuera de Chiclayo?',
                'respuesta' => 'Sí, también atendemos zonas cercanas dentro de la región Lambayeque. Consúltanos por tu ubicación específica.',
            ],
        ];

        foreach ($preguntas as $i => $pregunta) {
            PreguntaFrecuente::create([
                'pregunta' => $pregunta['pregunta'],
                'respuesta' => $pregunta['respuesta'],
                'orden' => $i,
                'visible' => true,
            ]);
        }
    }
}

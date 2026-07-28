<?php

namespace Database\Seeders;

use App\Models\Servicio;
use Illuminate\Database\Seeder;

class ServicioSeeder extends Seeder
{
    public function run(): void
    {
        $servicios = [
            [
                'titulo' => 'Venta de propiedades comerciales',
                'descripcion' => 'Te acompañamos en todo el proceso de venta de tu oficina, local o almacén, desde la tasación hasta el cierre del contrato.',
                'imagen' => 'servicio-venta.jpg',
            ],
            [
                'titulo' => 'Alquiler de espacios comerciales',
                'descripcion' => 'Encontramos el inquilino ideal para tu propiedad o el espacio perfecto para tu negocio, con contratos claros y seguros.',
                'imagen' => 'servicio-alquiler.jpg',
            ],
            [
                'titulo' => 'Asesoría legal inmobiliaria',
                'descripcion' => 'Revisión de contratos, saneamiento de propiedades y acompañamiento legal en cada etapa de la transacción.',
                'imagen' => 'servicio-legal.jpg',
            ],
        ];

        foreach ($servicios as $i => $servicio) {
            Servicio::create([
                'titulo' => $servicio['titulo'],
                'descripcion' => $servicio['descripcion'],
                'imagen' => $servicio['imagen'],
                'orden' => $i,
                'created_at' => now(),
            ]);
        }
    }
}

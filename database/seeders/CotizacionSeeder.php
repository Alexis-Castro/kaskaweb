<?php

namespace Database\Seeders;

use App\Models\Cotizacion;
use App\Models\Servicio;
use Illuminate\Database\Seeder;

class CotizacionSeeder extends Seeder
{
    public function run(): void
    {
        $servicioVenta = Servicio::where('titulo', 'Venta de propiedades comerciales')->first();
        $servicioAlquiler = Servicio::where('titulo', 'Alquiler de espacios comerciales')->first();

        $cotizaciones = [
            [
                'nombres' => 'Andrea Vasquez',
                'email' => 'andrea.vasquez@example.com',
                'telefono' => '+51 976543210',
                'servicio_id' => $servicioVenta?->id,
                'descripcion' => 'Quiero vender mi local comercial de 60m² en el centro de Chiclayo. Necesito una tasación.',
                'estado' => 'pendiente',
            ],
            [
                'nombres' => 'Carlos Rimarachin',
                'email' => 'carlos.rimarachin@example.com',
                'telefono' => '+51 965432109',
                'servicio_id' => $servicioAlquiler?->id,
                'descripcion' => 'Busco alquilar una oficina para 10 personas, presupuesto hasta S/ 2500 mensuales.',
                'estado' => 'contactado',
            ],
            [
                'nombres' => 'Rosa Delgado',
                'email' => 'rosa.delgado@example.com',
                'telefono' => '+51 954321098',
                'servicio_id' => $servicioVenta?->id,
                'descripcion' => 'Ya cerramos la venta de mi propiedad, gracias por el apoyo durante el proceso.',
                'estado' => 'cerrado',
            ],
        ];

        foreach ($cotizaciones as $cotizacion) {
            Cotizacion::create($cotizacion + ['created_at' => now()]);
        }
    }
}

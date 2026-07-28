<?php

namespace Database\Seeders;

use App\Models\Contacto;
use Illuminate\Database\Seeder;

class ContactoSeeder extends Seeder
{
    public function run(): void
    {
        $contactos = [
            [
                'nombres' => 'Fernando Diaz',
                'asunto' => 'Consulta sobre local en Av. Balta',
                'email' => 'fernando.diaz@example.com',
                'telefono' => '+51 987654321',
                'mensaje' => 'Buenas tardes, vi el local comercial publicado en su web y quisiera saber si sigue disponible y cuál es el precio de alquiler.',
                'leido' => false,
            ],
            [
                'nombres' => 'Patricia Gomez',
                'asunto' => 'Información general',
                'email' => 'patricia.gomez@example.com',
                'telefono' => '+51 912345678',
                'mensaje' => 'Hola, quisiera más información sobre sus servicios de asesoría legal para compra de propiedades.',
                'leido' => true,
            ],
            [
                'nombres' => 'Miguel Torres',
                'asunto' => null,
                'email' => 'miguel.torres@example.com',
                'telefono' => '+51 999888777',
                'mensaje' => 'Estoy interesado en el almacén industrial que publicaron. ¿Podrían contactarme para coordinar una visita?',
                'leido' => false,
            ],
        ];

        foreach ($contactos as $contacto) {
            Contacto::create($contacto + ['created_at' => now()]);
        }
    }
}

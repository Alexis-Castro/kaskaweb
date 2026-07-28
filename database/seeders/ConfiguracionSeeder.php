<?php

namespace Database\Seeders;

use App\Models\Configuracion;
use Illuminate\Database\Seeder;

class ConfiguracionSeeder extends Seeder
{
    public function run(): void
    {
        $configuraciones = [
            // Grupo: general
            ['clave' => 'nombre_empresa', 'valor' => 'Inmobiliaria Demo', 'tipo' => 'texto', 'grupo' => 'general'],
            ['clave' => 'eslogan', 'valor' => 'Encuentra el espacio ideal para tu negocio', 'tipo' => 'texto', 'grupo' => 'general'],

            // Grupo: contacto
            ['clave' => 'telefono', 'valor' => '+51 987 654 321', 'tipo' => 'texto', 'grupo' => 'contacto'],
            ['clave' => 'email_contacto', 'valor' => 'contacto@inmobiliariademo.pe', 'tipo' => 'texto', 'grupo' => 'contacto'],
            ['clave' => 'direccion', 'valor' => 'Av. Balta 123, Chiclayo', 'tipo' => 'texto', 'grupo' => 'contacto'],
            ['clave' => 'ciudad', 'valor' => 'Chiclayo', 'tipo' => 'texto', 'grupo' => 'contacto'],

            // Grupo: hero (portada)
            ['clave' => 'video_inicio', 'valor' => null, 'tipo' => 'video', 'grupo' => 'hero'],
            ['clave' => 'imagen_inicio', 'valor' => 'hero-demo.jpg', 'tipo' => 'imagen', 'grupo' => 'hero'],

            // Grupo: stats (contadores del home)
            ['clave' => 'stat_1_label', 'valor' => 'Clientes satisfechos', 'tipo' => 'texto', 'grupo' => 'stats'],
            ['clave' => 'stat_1_valor', 'valor' => '150', 'tipo' => 'numero', 'grupo' => 'stats'],
            ['clave' => 'stat_2_label', 'valor' => 'Proyectos entregados', 'tipo' => 'texto', 'grupo' => 'stats'],
            ['clave' => 'stat_2_valor', 'valor' => '80', 'tipo' => 'numero', 'grupo' => 'stats'],
            ['clave' => 'stat_3_label', 'valor' => 'Años de experiencia', 'tipo' => 'texto', 'grupo' => 'stats'],
            ['clave' => 'stat_3_valor', 'valor' => '6', 'tipo' => 'numero', 'grupo' => 'stats'],
        ];

        foreach ($configuraciones as $config) {
            Configuracion::create($config);
        }
    }
}

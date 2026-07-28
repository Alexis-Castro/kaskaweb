<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Orden importa: primero lo que no depende de nada, luego lo que sí.
        $this->call([
            UsuarioSeeder::class,          // depende de roles (ya sembrados en la migración)
            ConfiguracionSeeder::class,
            CategoriaSeeder::class,
            CargoSeeder::class,
            PersonalSeeder::class,         // depende de CargoSeeder
            ServicioSeeder::class,
            ProyectoSeeder::class,         // depende de CategoriaSeeder
            TestimonioSeeder::class,
            PreguntaFrecuenteSeeder::class,
            ContactoSeeder::class,
            CotizacionSeeder::class,        // depende de ServicioSeeder
        ]);
    }
}

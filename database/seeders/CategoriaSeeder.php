<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategoriaSeeder extends Seeder
{
    public function run(): void
    {
        $categorias = [
            // tipo: proyecto (portafolio)
            ['nombre' => 'Oficinas', 'tipo' => 'proyecto'],
            ['nombre' => 'Locales comerciales', 'tipo' => 'proyecto'],
            ['nombre' => 'Almacenes', 'tipo' => 'proyecto'],

            // tipo: servicio
            ['nombre' => 'Venta', 'tipo' => 'servicio'],
            ['nombre' => 'Alquiler', 'tipo' => 'servicio'],
            ['nombre' => 'Asesoría legal', 'tipo' => 'servicio'],

            // tipo: blog
            ['nombre' => 'Tendencias del mercado', 'tipo' => 'blog'],
            ['nombre' => 'Consejos para propietarios', 'tipo' => 'blog'],
        ];

        foreach ($categorias as $cat) {
            Categoria::create([
                'nombre' => $cat['nombre'],
                'slug' => Str::slug($cat['nombre']),
                'tipo' => $cat['tipo'],
            ]);
        }
    }
}

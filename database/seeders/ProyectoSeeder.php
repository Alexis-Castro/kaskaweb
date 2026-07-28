<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Proyecto;
use Illuminate\Database\Seeder;

class ProyectoSeeder extends Seeder
{
    public function run(): void
    {
        $proyectos = [
            [
                'nombre' => 'Torre Corporativa San Isidro',
                'descripcion' => 'Modernas oficinas de 45m² a 120m², listas para operar, ubicadas en zona empresarial de alto tránsito.',
                'categoria' => 'Oficinas',
                'destacado' => true,
            ],
            [
                'nombre' => 'Local Esquina Av. Balta',
                'descripcion' => 'Local comercial de 80m² con doble frente, ideal para tienda o restaurante, alto flujo peatonal.',
                'categoria' => 'Locales comerciales',
                'destacado' => true,
            ],
            [
                'nombre' => 'Almacén Industrial Chiclayo Norte',
                'descripcion' => 'Almacén de 500m² con acceso para camiones, altura de 8m y oficina administrativa incluida.',
                'categoria' => 'Almacenes',
                'destacado' => false,
            ],
        ];

        foreach ($proyectos as $i => $proyecto) {
            $categoria = Categoria::where('nombre', $proyecto['categoria'])->where('tipo', 'proyecto')->first();

            Proyecto::create([
                'nombre' => $proyecto['nombre'],
                'descripcion' => $proyecto['descripcion'],
                'imagen_previa' => 'proyecto-demo-' . ($i + 1) . '.jpg',
                'categoria_id' => $categoria->id,
                'destacado' => $proyecto['destacado'],
                'orden' => $i,
                'created_at' => now(),
            ]);
        }
    }
}

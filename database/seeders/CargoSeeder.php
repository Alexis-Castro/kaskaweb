<?php

namespace Database\Seeders;

use App\Models\Cargo;
use Illuminate\Database\Seeder;

class CargoSeeder extends Seeder
{
    public function run(): void
    {
        $cargos = ['Gerente General', 'Asesor Comercial', 'Asesor Legal', 'Coordinador de Marketing'];

        foreach ($cargos as $nombre) {
            Cargo::create(['nombre' => $nombre]);
        }
    }
}

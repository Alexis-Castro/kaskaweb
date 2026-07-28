<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50)->unique();
            $table->timestamp('created_at')->useCurrent();
        });

        // Seed inicial: roles base
        \DB::table('roles')->insert([
            ['nombre' => 'superadmin', 'created_at' => now()],
            ['nombre' => 'editor', 'created_at' => now()],
            ['nombre' => 'colaborador', 'created_at' => now()],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};

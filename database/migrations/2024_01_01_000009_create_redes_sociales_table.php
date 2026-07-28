<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('redes_sociales', function (Blueprint $table) {
            $table->id();
            $table->enum('red', ['facebook', 'instagram', 'linkedin', 'tiktok', 'twitter', 'whatsapp', 'youtube', 'otro']);
            $table->string('url', 500);
            $table->string('redeable_type', 50); // 'personal', 'empresa'
            $table->unsignedBigInteger('redeable_id');
            $table->index(['redeable_type', 'redeable_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('redes_sociales');
    }
};

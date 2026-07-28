<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('medios', function (Blueprint $table) {
            $table->id();
            $table->string('archivo');
            $table->enum('tipo', ['imagen', 'video', 'documento'])->default('imagen');
            $table->string('mediable_type', 50); // 'proyecto', 'servicio', 'personal', 'blog'
            $table->unsignedBigInteger('mediable_id');
            $table->unsignedInteger('orden')->default(0);
            $table->timestamp('created_at')->useCurrent();
            $table->index(['mediable_type', 'mediable_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('medios');
    }
};

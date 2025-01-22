<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('lente_rotos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo',50);
            $table->string('tipo',50);
            $table->unsignedBigInteger('cantidad');
            $table->string('especificaciones',150);
            $table->string('justificacion',150);
            $table->string('observaciones',50);
            $table->unsignedBigInteger('usuario_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lente_rotos');
    }
};

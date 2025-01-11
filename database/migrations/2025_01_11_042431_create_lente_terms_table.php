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
        Schema::create('lente_terms', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',200);
            $table->string('marca',150);
            $table->string('diseno');
            $table->string('esf_desde',10);
            $table->string('cil_desde',10);
            $table->string('esf_hasta',10);
            $table->string('cil_hasta',10);
            $table->string('usuario_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lente_terms');
    }
};

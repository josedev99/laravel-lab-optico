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
        Schema::create('existencias', function (Blueprint $table) {
            $table->id();
            $table->string('codigo',100)->nullable()->default('');
            $table->string('categoria',50);
            $table->unsignedBigInteger('stock');
            $table->string('esfera',10);
            $table->string('cilindro',10);
            $table->unsignedBigInteger('lente_term_id');
            $table->unsignedBigInteger('usuario_id');

            $table->foreign('lente_term_id')->references('id')->on('lente_terms');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('existencias');
    }
};

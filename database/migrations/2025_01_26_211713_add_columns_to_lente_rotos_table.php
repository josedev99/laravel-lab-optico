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
        Schema::table('lente_rotos', function (Blueprint $table) {
            $table->unsignedBigInteger('lente_id')->after('observaciones');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lente_rotos', function (Blueprint $table) {
            $table->removeColumn('lente_id');
        });
    }
};

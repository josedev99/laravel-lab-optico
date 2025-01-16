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
        Schema::table('existencias', function (Blueprint $table) {
            $table->unsignedBigInteger('stock_min')->after('stock')->nullable()->default(0);
            $table->decimal('precio_venta',8,4)->after('stock_min');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('existencias', function (Blueprint $table) {
            $table->dropColumn(['stock_min','precio_venta']);
        });
    }
};

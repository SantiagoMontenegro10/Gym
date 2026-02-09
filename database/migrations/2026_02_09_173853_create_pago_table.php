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
        Schema::create('pago', function (Blueprint $table) {
    $table->id('id_pago');
    $table->unsignedBigInteger('id_cliente')->nullable();
    $table->string('registrado_por')->default('');
    $table->string('costo_total')->nullable();
    $table->string('paga_con')->nullable();
    $table->timestamp('fecha')->nullable();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pago');
    }
};

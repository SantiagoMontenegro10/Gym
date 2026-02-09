<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('abono', function (Blueprint $table) {
            $table->id('id_abono');
            $table->integer('monto')->nullable();
            $table->unsignedBigInteger('cliente')->nullable();
            $table->timestamp('fecha')->nullable();
            $table->string('recepcionista')->nullable();
            $table->string('derecho_pago')->default('');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('abono');
    }
};


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
        Schema::create('cliente', function (Blueprint $table) {
    $table->id('id_cliente');
    $table->unsignedBigInteger('id_membresia')->nullable();
    $table->string('tipo_usuario')->nullable();
    $table->string('creado_por')->default('');
    $table->string('usuario')->default('');
    $table->string('password')->default('');
    $table->string('dni')->nullable();
    $table->string('nombre')->nullable();
    $table->string('correo')->nullable();
    $table->string('telefono')->nullable();
    $table->string('direccion')->nullable();
    $table->timestamp('desde')->nullable();
    $table->timestamp('hasta')->nullable();
    $table->integer('DT')->nullable();
    $table->integer('DA')->nullable();
    $table->integer('DR')->nullable();
    $table->string('foto')->default('');
    $table->string('pago')->nullable();
    $table->integer('debe')->nullable();
    $table->string('codigo')->nullable();
    $table->integer('huella_id')->nullable();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cliente');
    }
};

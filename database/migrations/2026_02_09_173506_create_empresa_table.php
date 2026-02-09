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
        Schema::create('empresa', function (Blueprint $table) {
    $table->id('id_empresa');
    $table->string('nombre')->nullable();
    $table->string('ubicacion')->nullable();
    $table->string('telefono', 20)->default('');
    $table->string('correo')->nullable();
    $table->string('foto')->default('');
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empresa');
    }
};

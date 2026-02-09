<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('cliente', function (Blueprint $table) {
            $table->id('id_cliente');
            $table->string('usuario')->unique();
            $table->string('password');
            $table->string('tipo_usuario')->default('cliente');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cliente');
    }
};


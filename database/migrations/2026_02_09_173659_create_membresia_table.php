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
        Schema::create('membresia', function (Blueprint $table) {
    $table->id('id_membresia');
    $table->string('categoria')->default('');
    $table->string('nombre')->nullable();
    $table->string('meses')->nullable();
    $table->string('modo')->nullable();
    $table->integer('precio')->nullable();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('membresia');
    }
};

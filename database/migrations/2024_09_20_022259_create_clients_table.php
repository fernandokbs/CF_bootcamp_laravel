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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('email', 100);
            $table->string('password');
            $table->string('tratamiento', 10)->nullable();;
            $table->string('rut', 20)->nullable();;
            $table->string('telefono', 30)->nullable();;
            $table->string('direccion', 255)->nullable();;
            $table->timestamps();
            $table->integer('activo')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};

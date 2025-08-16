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
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('usuario_id')->unique();
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');

            $table->string('nombre');
            $table->string('apellido');
            $table->string('dni')->unique();
            $table->date('fecha_nacimiento');
            $table->string('telefono');
            $table->string('ref_celular');
            $table->string('parentesco'); // Parentesco con el contacto de emergencia (referencia de celular)
            $table->string('profesion')->nullable();
            $table->string('direccion');
            $table->text('foto')->nullable();
            $table->enum('estado', ['activo', 'inactivo'])->default('activo');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estudiantes');
    }
};

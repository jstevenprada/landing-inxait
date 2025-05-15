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
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', length: 200);
            $table->string('apellido', length: 200);
            $table->integer('cedula')->unique();
            $table->char('id_departamento', 2);
            $table->char('id_ciudad', 5);
            $table->string('celular', 15);
            $table->string('email', length: 200)->unique();
            $table->boolean('habeas_data')->default(0);
            $table->boolean('ganador')->default(0);
            $table->timestamp('seleccionado_en');
            $table->foreign('id_departamento')->references('id')->on('departments')->onDelete('cascade');
            $table->foreign('id_ciudad')->references('id')->on('cities')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
};

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
        Schema::create('permisos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('status', 10);
            $table->string('motivo', 30);
            $table->string('descripcion', 200);
            $table->string('tipo', 30);
            //$table->string('editado', 25);
            $table->integer('id_secretaria');
            $table->foreign('id_secretaria')->references('id')->on('users')->onDelete('cascade');
            
            $table->integer('id_alumno');
            $table->foreign('id_alumno')->references('id')->on('alumnos')->onDelete('cascade');
        
            // Nuevos campos para manejar el tiempo según el tipo de permiso
            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_fin')->nullable();
            $table->time('hora_inicio')->nullable();
            $table->time('hora_fin')->nullable();
        
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permisos');
    }
};

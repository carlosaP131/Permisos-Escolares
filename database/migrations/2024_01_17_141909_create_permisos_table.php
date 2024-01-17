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
            $table->string('Status', 10);
            $table->string('Motivo', 30);
            $table->string('Descripcion', 200);
            $table->string('Tiempo', 5)->nullable()->default('text');
            $table->unsignedInteger('id_alumno');
            $table->foreign('id_alumno')->references('Matricula')->on('alumnos')->onDelete('cascade');
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

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
        Schema::create('alumnos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('matricula');
            $table->string('nombre', 100);
            $table->string('apellido', 100);
            $table->string('semestre', 100);
            $table->bigInteger('id_carrera')->unsigned();
            $table->foreign('id_carrera')->references('id')->on('carreras')->onDelete('cascade');
            $table->string('grupo', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumnos');
    }
};

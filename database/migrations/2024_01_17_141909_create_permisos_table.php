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
            $table->string('tiempo', 100);
            $table->string('tipo', 30);
            $table->string('editado', 25);
            $table->unsignedInteger('id_alumno');
            $table->foreign('id_alumno')->references('id')->on('alumnos')->onDelete('cascade');
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

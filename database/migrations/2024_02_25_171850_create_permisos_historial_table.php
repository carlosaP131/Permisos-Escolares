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
        Schema::create('permisos_historial', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('folio');
            $table->string('status', 10);
            $table->string('motivo', 30);
            $table->string('descripcion', 200);
            $table->string('tipo', 30);
            $table->string('nombre_secretaria');
            $table->string('matricula');            
        
            //campos para manejar el tiempo según el tipo de permiso
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
        Schema::dropIfExists('permisos_historial');
    }
};

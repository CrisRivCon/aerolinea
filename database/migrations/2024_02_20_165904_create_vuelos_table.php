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
        Schema::create('vuelos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo');
            $table->foreignId('id_aeropuerto_origen')->constrained('aeropuertos');
            $table->foreignId('id_aeropuerto_destino')->constrained('aeropuertos');
            $table->foreignId('id_companya')->constrained('companyas');
            $table->date('fecha_salida');
            $table->date('fecha_llegada');
            $table->integer('plazas');
            $table->integer('precio');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vuelos');
    }
};

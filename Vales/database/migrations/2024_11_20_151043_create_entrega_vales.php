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
        Schema::create('entrega_vales', function (Blueprint $table) {
            $table->id();
            $table->string('numero_solicitud');
            $table->string('programa');
            $table->string('suministra');
            $table->string('solicita');
            $table->string('depto_solicita');
            $table->string('departamento');
            $table->text('mision');
            $table->string('tipo_fondo');
            $table->date('fecha_reserva');
            $table->date('fecha_vence');
            $table->string('destino');
            $table->string('proyecto');
            $table->string('autoriza');
            $table->string('combustible');
            $table->float('cantidad_combustible');
            $table->float('conversion');
            $table->string('serie');
            $table->string('no_requisicion');
            $table->float('precio_compra')->nullable();
            $table->float('precio_actual')->nullable();
            $table->string('autorizados')->nullable();
            $table->string('digitados')->nullable();
            $table->string('serie_vale')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entrega_vales');
    }
};
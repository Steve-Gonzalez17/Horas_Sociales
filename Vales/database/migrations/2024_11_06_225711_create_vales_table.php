<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateValesTable extends Migration
{
    public function up()
    {
        Schema::create('vales', function (Blueprint $table) {
            $table->id();
            $table->string('corr'); // Correlativo
            $table->string('tipo_combustible');
            $table->string('tipo_fondo');
            $table->string('programa');
            $table->date('fecha_fac');
            $table->string('nocompra');
            $table->date('feini');
            $table->date('fefin');
            $table->string('nfactura');
            $table->string('proveedor');
            $table->string('valorvale');
            $table->string('precio_referencia');
            $table->string('serie_vale');
            $table->text('observacion')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('vales');
    }
}
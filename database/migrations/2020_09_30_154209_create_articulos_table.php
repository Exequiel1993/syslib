<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticulosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigoUnico');
            $table->string('descripcion');
            $table->string('imagen');
            $table->integer('cantidad');
            $table->string('precioVenta');
            $table->string('stockMinimo');
            $table->string('stockMaximo');
            $table->integer('tipoArticulo_id')->unsigned();
            $table->integer('marca_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('tipoArticulo_id')->references('id')->on('tipo_articulos');
            $table->foreign('marca_id')->references('id')->on('marcas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('articulos');
    }
}

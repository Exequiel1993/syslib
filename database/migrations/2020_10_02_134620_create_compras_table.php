<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComprasTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cantidad');
            $table->integer('proveedor_id')->unsigned();
            $table->integer('articulo_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('proveedor_id')->references('id')->on('proveedors');
            $table->foreign('articulo_id')->references('id')->on('articulos');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('compras');
    }
}

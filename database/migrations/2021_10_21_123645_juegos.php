<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Juegos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('juegos', function (Blueprint $table) {

            // cambia motor base de datos
            $table->engine='InnoDB';
            
            // campos
            $table->bigIncrements('id');
            // llave foranea
            $table->bigInteger('tienda_id')->unsigned();
            $table->string('nombre');
            $table->timestamps();

            // relacion
            $table->foreign('tienda_id')->references('id')->on('tiendas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimalesVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animales_ventas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('animal_id');
            $table->foreign('animal_id')->references('id')->on('animales');
            $table->date('fechaVenta');
            $table->double('valor');           
            $table->double('valorkg')->nullable();           
            $table->string('peso')->nullable();
            $table->string('edad')->nullable();
            $table->string('comprador');
            $table->string('documento')->nullabe();
            $table->string('ubicacion')->nullable();
            $table->string('tipo');
            $table->integer('estado')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('animales_ventas');
    }
}

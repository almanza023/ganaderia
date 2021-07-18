<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animales', function (Blueprint $table) {
            $table->id();  
            $table->unsignedBigInteger('raza_id');
            $table->foreign('raza_id')->references('id')->on('razas');         
            $table->string('nombre');
            $table->string('sexo');
            $table->date('fechaNacimiento')->nullable();
            $table->string('edad')->nullable();
            $table->string('padre')->nullable();
            $table->string('madre')->nullable();
            $table->string('numRegistro')->nullable();
            $table->string('color');
            $table->string('hierro')->nullable();
            $table->string('hijos')->nullable();
            $table->string('machos')->nullable();
            $table->string('hembras')->nullable();
            $table->string('abortos')->nullable();
            $table->string('grupo')->nullable();
            $table->string('lote')->nullable();
            $table->date('fechaPesaje')->nullable();
            $table->string('peso')->nullable();
            $table->string('tipo');
            $table->string('observaciones')->nullable();                    
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
        Schema::dropIfExists('animales');
    }
}

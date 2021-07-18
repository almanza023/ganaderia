<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePotrerosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('potreros', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');           
            $table->string('area')->nullable();
            $table->string('cercas')->nullable();
            $table->string('maleza')->nullable();          
            $table->string('tipo')->nullable();
            $table->string('hijos')->nullable();            
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
        Schema::dropIfExists('potreros');
    }
}

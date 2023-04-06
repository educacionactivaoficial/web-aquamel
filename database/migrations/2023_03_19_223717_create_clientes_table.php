<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id('id'); //
            $table->string('nombre'); //
            $table->string('apellido'); //
            $table->bigInteger('dni')->nullable();
            $table->bigInteger('cuit')->nullable(); 
            $table->string('email')->unique();  //
            $table->string('razon_social',50)->nullable();
            $table->string('direccion');
            $table->integer('puntos')->default(0);
            $table->date('ultima_compra');
            $table->timestamp('email_verified_at')->nullable(); //puede ser nulo
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
        Schema::dropIfExists('clientes');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('proveedor_id');
            $table->unsignedBigInteger('marca_id');
            $table->string('nombre',50);
            $table->string('descripcion',255);
            $table->unsignedInteger('stock');
            $table->unsignedDouble('tamano_litros');
            $table->unsignedDouble('ultimo_precio_compra');
            $table->unsignedDouble('alicuota_iva');
            $table->timestamp('ultima_fecha_actualizacion_precio');
            $table->timestamps();
            
            $table->foreign('proveedor_id')
                  ->references('id')->on('proveedores');
            
             $table->foreign('marca_id')
                  ->references('id')->on('marcas');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropForeign('productos_proveedor_id_foreign');
        // Schema::dropForeign('productos_marca_id_foreign');
        Schema::dropIfExists('productos');
    }
}

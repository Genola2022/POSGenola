<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentadetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventadetalles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('venta_id');
            $table->unsignedBigInteger('producto_id');
            $table->decimal('cantidad',7,2);
            $table->decimal('precio',7,2);
            $table->decimal('subtotal',7,2);
            $table->decimal('descuento',5,2);
            $table->decimal('total',7,2);
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
        Schema::dropIfExists('ventadetalles');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompradetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compradetalles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('compra_id');
            $table->unsignedBigInteger('producto_id');
            $table->decimal('costo',7,2);
            $table->decimal('cantidad',7,2);
            $table->decimal('total',7,2);
            $table->timestamps();

            $table->foreign('compra_id')->references('id')->on('compras')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('producto_id')->references('id')->on('productos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('compradetalles');
    }
}

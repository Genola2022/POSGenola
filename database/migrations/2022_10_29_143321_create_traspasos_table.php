<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTraspasosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('traspasos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('origen');
            $table->unsignedBigInteger('destino');
            $table->unsignedBigInteger('usuario_id');
            $table->string('pendiente');
            $table->timestamps();

            $table->foreign('usuario_id')->references('id')->on('users');
            $table->foreign('origen')->references('id')->on('sucursals');
            $table->foreign('destino')->references('id')->on('sucursals');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('traspasos');
    }
}

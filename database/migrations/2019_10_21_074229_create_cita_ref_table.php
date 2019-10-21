<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitaRefTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cita_refs', function (Blueprint $table) {
            $table->Increments('id');
            $table->unsignedInteger('id_cita');
            $table->unsignedInteger('id_real');
            $table->foreign('id_cita','fk_citaref_cita')->references('id')->on('citas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_real','fk_citaref_referencia')->references('id')->on('referencias')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cita_refs');
    }
}

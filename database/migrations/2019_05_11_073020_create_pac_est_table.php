<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePacEstTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citas', function (Blueprint $table) {
            $table->Increments('id');
            $table->unsignedInteger('id_pac');
            $table->unsignedInteger('id_est');
            $table->unsignedInteger('id_ref');
            $table->string('comp', 20);
            $table->string('estado', 10);
            $table->decimal('costo',10,0);
            $table->char('tipo_cita', 1);
            $table->date('fecha');
            $table->string('recibido',30);
            $table->string('estado_pago',30);
            $table->foreign('id_pac','fk_pacest_paciente')->references('id')->on('pacientes')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_est','fk_pacest_estudio')->references('id')->on('estudios')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_ref','fk_pacest_referencia')->references('id')->on('referencias')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('citas');
    }
}

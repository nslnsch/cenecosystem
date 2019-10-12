<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePacienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->Increments('id');
            $table->char('genero', 1);
            $table->string('cedula', 15)->unique();
            $table->string('nombre', 50);
            $table->string('apellido', 50);
            $table->string('telefono', 12);
            $table->date('fecnac');
            $table->string('dirhab', 500);
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
        Schema::dropIfExists('pacientes');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComplementoEstudioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comp_estudios', function (Blueprint $table) {
            $table->Increments('id');
            $table->unsignedInteger('id_est');
            $table->string('subestudio',20);
            $table->decimal('precio',10,0);
            $table->foreign('id_est','fk_complemento_estudio_estudio')->references('id')->on('estudios')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('compestudios');
    }
}

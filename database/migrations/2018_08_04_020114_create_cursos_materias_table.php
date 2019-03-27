<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCursosMateriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursos_materias', function (Blueprint $table) {
            $table->integer('curso_id')->unsigned();
            $table->integer('materia_id')->unsigned();
            $table->timestamps();
            $table->foreign('curso_id')->references('id')->on('cursos');
            $table->foreign('materia_id')->references('id')->on('materias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cursos_materias');
    }
}

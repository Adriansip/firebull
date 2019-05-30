<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCiudadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ciudades', function (Blueprint $table) {
          $table->increments('idCiudad');
          $table->integer('idEstado')->unsigned()->nullable();
          $table->string('ciudad');
          $table->timestamps();

          $table->foreign('idEstado')
             ->references('idEstado')->on('estados')
             ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ciudades', function (Blueprint $table) {
            $table->dropForeign('ciudades_idEstado_foreign');
        });
        Schema::dropIfExists('ciudades');
    }
}

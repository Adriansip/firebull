<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCotizacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cotizaciones', function (Blueprint $table) {
            $table->increments('idCotizacion');
            $table->integer('idCliente')->unsigned()->nullable();
            $table->integer('noArticulos');
            $table->boolean('atendido')->default(false);
            $table->float('subtotal')->nullable();
            $table->float('iva')->nullable();
            $table->float('total')->nullable();
            $table->timestamps();

            $table->foreign('idCliente')
                ->references('idCliente')->on('clientes')
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
        Schema::table('cotizaciones', function (Blueprint $table) {
            $table->dropForeign('cotizaciones_idCliente_foreign');
        });
        Schema::dropIfExists('cotizaciones');
    }
}

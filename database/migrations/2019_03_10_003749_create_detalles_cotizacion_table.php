<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetallesCotizacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalles_cotizacion', function (Blueprint $table) {
            $table->increments('idDetalle');
            $table->integer('idCotizacion')->unsigned()->nullable();
            $table->integer('cantidad')->default(1);
            $table->integer('idProducto')->unsigned()->nullable();
            $table->float('precioUnitario')->nullable();
            $table->float('total')->nullable();
            $table->timestamps();

            $table->foreign('idCotizacion')
              ->references('idCotizacion')->on('cotizaciones')
              ->onDelete('set null');

            $table->foreign('idProducto')
                ->references('idProducto')->on('productos')
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
        Schema::table('detalles_cotizacion', function (Blueprint $table) {
            $table->dropForeign('detalles_cotizacion_idCotizacion_foreign');
            $table->dropForeign('detalles_cotizacion_idProducto_foreign');
        });
        Schema::dropIfExists('detalles_cotizacion');
    }
}

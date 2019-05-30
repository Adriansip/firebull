<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('idProducto');
            $table->string('producto');
            $table->integer('idCategoria')->unsigned()->nullable();
            $table->string('descripcion')->nullable();
            $table->string('imagen')->nullable()->default('no disponible.png');
            $table->boolean('oferta')->default(false);
            $table->timestamps();


            $table->foreign('idCategoria')
                ->references('idCategoria')->on('categorias')
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
      Schema::table('productos', function (Blueprint $table) {
           $table->dropForeign('productos_idCategoria_foreign');
       });
        Schema::dropIfExists('productos');
    }
}

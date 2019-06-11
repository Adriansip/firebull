<?php

use Illuminate\Database\Seeder;
use App\Producto;
use App\Categoria;

class ProductoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoria1=Categoria::where('categoria', 'Consumibles')->first();
        $categoria2=Categoria::where('categoria', 'Proteccion a la cabeza')->first();
        $categoria3=Categoria::where('categoria', 'Proteccion a las manos')->first();
        $categoria4=Categoria::where('categoria', 'Proteccion a la cintura')->first();

        $producto=new Producto();
        $producto->producto='Extintor 5 kg';
        $producto->idCategoria=$categoria1->idCategoria;
        $producto->descripcion='Extintor marca akme con la mejor capacidad';
        $producto->imagen='extintor.png';
        $producto->oferta=true;
        $producto->save();

        $producto=new Producto();
        $producto->producto='Zapato Borcegui';
        $producto->idCategoria=$categoria1->idCategoria;
        $producto->descripcion='Zapato Borcegui clasico (sin casquillo)';
        $producto->imagen='borcegui.png';
        $producto->oferta=true;
        $producto->save();

        $producto=new Producto();
        $producto->producto='Mascarilla cara completa';
        $producto->idCategoria=$categoria2->idCategoria;
        $producto->descripcion='Proteccion contra polvo y gases';
        $producto->imagen='mascarilla.png';
        $producto->oferta=true;
        $producto->save();

        $producto=new Producto();
        $producto->producto='Casco de aluminio';
        $producto->idCategoria=$categoria2->idCategoria;
        $producto->descripcion='Casco de aluminio con proteccion para la cabeza';
        $producto->imagen='casco_infra.png';
        $producto->oferta=true;
        $producto->save();

        $producto=new Producto();
        $producto->producto='Guantes aluminizados';
        $producto->idCategoria=$categoria3->idCategoria;
        $producto->descripcion='Proteccion para las manos';
        $producto->imagen='guantes_aluminizados.png';
        $producto->oferta=true;
        $producto->save();

        $producto=new Producto();
        $producto->producto='Guantes de piel';
        $producto->idCategoria=$categoria3->idCategoria;
        $producto->descripcion='Guantes de piel, ideales para cargar materiales asperos';
        $producto->imagen='guantes_piel.png';
        $producto->oferta=true;
        $producto->save();

        $producto=new Producto();
        $producto->producto='Guantes de piel';
        $producto->idCategoria=$categoria3->idCategoria;
        $producto->descripcion='Guantes de piel, ideales para cargar materiales asperos';
        $producto->imagen='guantes_piel.png';
        $producto->oferta=true;
        $producto->save();

        $producto=new Producto();
        $producto->producto='Guantes de algodon';
        $producto->idCategoria=$categoria3->idCategoria;
        $producto->descripcion='Guantes de algodon, ideales para cargar materiales asperos';
        $producto->imagen='guante_algodon.png';
        $producto->oferta=true;
        $producto->save();

        $producto=new Producto();
        $producto->producto='Ferula rigida adulto';
        $producto->idCategoria=$categoria4->idCategoria;
        $producto->descripcion='Ferula de proteccion para la cintura';
        $producto->imagen='ferula_rigida.png';
        $producto->oferta=false;
        $producto->save();
    }
}

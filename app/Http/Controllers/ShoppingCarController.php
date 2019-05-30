<?php

namespace App\Http\Controllers;

use Session;
use App\Producto;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ShoppingCarController extends Controller
{
    public function index()
    {
        if (Session::get('carro')) {
            $productos=Session::get('carro');
        } else {
            $productos=null;
        }
        return view('productos.shoppingCar', compact('productos'));
    }

    public function addShoppingCar(Request $request)
    {
        $producto=Producto::find($request->idProducto);
        $carro=(Object)array(
       'producto' => $producto,
       'cantidad' => $request->cantidad
     );

        Session::push('carro', $carro);
        $data=[
          'code'=>200,
          'estatus'=>'success',
          'message'=>'('.$request->cantidad.') '.$producto->producto.' agregado al carrito correctamente',
          'cantidad'=> count(Session::get('carro'))
        ];

        return response()->json($data, $data['code']);
    }

    public function deleteItem($index)
    {
        $productos=Session::get('carro');
        Session::pull('carro');
        unset($productos[$index]);
        $productos=array_values($productos);
        Session::put('carro', $productos);

        return view('productos.shoppingCar', compact('productos'));
    }
}

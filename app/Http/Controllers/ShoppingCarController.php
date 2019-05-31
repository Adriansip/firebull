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
        //Existia el registro
        $isExist=false;

        //Buscar producto en la DB
        $producto=Producto::find($request->idProducto);

        //Traer registros para verificar que exista o sea nuevo
        if (Session::has('carro')) {
            $productos=Session::get('carro');
            foreach ($productos as $stock) {
                if ($stock->idProducto == $request->idProducto) {
                    $stock->cantidad+=$request->cantidad;
                    $isExist=true;
                    break;
                }
            }
        }

        if (!$isExist) {
            $carro=(Object)array(
                'idProducto' => $request->idProducto,
                'producto' => $producto,
                'cantidad' => $request->cantidad
              );
            Session::push('carro', $carro);
            $message='('.$request->cantidad.') '.$producto->producto.' agregado al carrito correctamente';
        } else {
            Session::pull('carro');
            $productos=array_values($productos);
            Session::put('carro', $productos);
            $message='Se agregaron ('.$request->cantidad.') elementos mas a '.$producto->producto;
        }

        $data=[
          'code'=>200,
          'estatus'=>'success',
          'message'=>$message,
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

        return back();
    }

    public function destroy()
    {
        Session::pull('carro');
        return back();
    }
}

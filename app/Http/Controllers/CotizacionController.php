<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Cotizacion;
use App\DetallesCotizacion;

class CotizacionController extends Controller
{
    public function index(Request $request)
    {
        $cotizaciones= Cotizacion::orderBy('idCotizacion', 'DESC')->paginate(5);
        if ($request->ajax()) {
            return response()->json(view('Cotizaciones.cotizacion', compact('cotizaciones'))->render());
        }
        return view('Cotizaciones.cotizacion', compact('cotizaciones'));
    }

    public function show($idCotizacion)
    {
        $cotizaciones = Cotizacion::find($idCotizacion);
        $data=[
          'estatus'=>'success',
          'code'=>200,
          'cotizacion'=> $cotizaciones
        ];
        return response()->json($data, $data['code']);
    }

    public function store(Request $request)
    {
        $user=\Auth::user();
        $productos=$request->toArray();
        $cotizacion=new Cotizacion();
        $cotizacion->idCliente=$user->id;
        $cotizacion->noArticulos=count($productos);
        if ($cotizacion->save()) {
            foreach ($productos as $producto) {
                $detalles=new DetallesCotizacion();
                $detalles->idCotizacion=$cotizacion->idCotizacion;
                $detalles->idProducto=$producto['idProducto'];
                $detalles->cantidad=$producto['cantidad'];
                $detalles->save();
            }
            $data=[
            'status'=>'success',
            'code'=> 200,
            /*El prefijo NCOT, solo hace referencia a Numero de cotizacion,
            el valor importante es el numero despues de -, haciendo referencia al id de cotizacion*/
            'message' => 'Los detalles para tu cotizacion fueron enviados correctamente, el resultado estara disponible de 1 a 2 dias habiles y le
            seran notificados al correo registrado en la pagina. Para darle seguimiento a su cotizacion,
            conserve el siguiente codigo: NCOT-'.$cotizacion->idCotizacion
          ];
        } else {
            $data=[
            'status'=>'error',
            'code'=> 404,
            'message' => 'Surgio un error al generar su solicitud, intentelo mas tarde'
            ];
        }
        return response()->json($data, $data['code']);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\DetallesCotizacion;
use App\Cotizacion;

class DetallesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Recibir detalles, cantidad, idProducto, precio, total;
        $detalles=$request->toArray();
        //contar elementos
        $elementos=count($detalles);

        //Buscar la cotizacion correspondiente
        $idCotizacion=$request[$elementos-1];

        $cotizacion=Cotizacion::find($idCotizacion)->first();

        /*Actualizar los registros de la base de datos, con su precio unitario y el total*/
        for ($i=0; $i <count($cotizacion->detalles); $i++) {
            $cotizacion->detalles[$i]->precioUnitario=$detalles[$i]['precioUnitario'];
            $cotizacion->detalles[$i]->total=$detalles[$i]['total'];
            $cotizacion->detalles[$i]->save();
        }

        /*MAndar el email y Actualizar el estatus de la cotizacion*/

        $data=[
          'detalles'=>$detalles,
          'cotizacionDetalles'=>$cotizacion->detalles
        ];
        return response()->json($data, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detalles=DetallesCotizacion::where('idCotizacion', $id)->get()->load('producto');
        return $detalles;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

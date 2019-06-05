<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\DetallesCotizacion;
use App\Cotizacion;
use Mail;

class DetallesController extends Controller
{
    protected $email='';
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

        //Acumulador
        $subtotal=0;
        /*Actualizar los registros de la base de datos, con su precio unitario y el total*/
        for ($i=0; $i <count($cotizacion->detalles); $i++) {
            $cotizacion->detalles[$i]->precioUnitario=$detalles[$i]['precioUnitario'];
            $cotizacion->detalles[$i]->total=$detalles[$i]['total'];
            $subtotal+=$detalles[$i]['total'];
            $cotizacion->detalles[$i]->save();
        }

        $this->email=$cotizacion->usuario->email;
        /*MAndar el email y Actualizar el estatus de la cotizacion*/
        $this->sendEmail($cotizacion, $subtotal);

        /*Marcar cotizacion como atendida*/
        $cotizacion->atendido=1;
        $cotizacion->subtotal=$subtotal;
        $cotizacion->iva=16;
        $cotizacion->total=$subtotal*1.16;
        $cotizacion->save();

        /*$data=[
          'subtotal'=>$subtotal,
          'detalles'=>$detalles,
          'cotizacionDetalles'=>$cotizacion->detalles
        ];*/
        $data=[
          'estatus'=>'success',
          'code'=>200,
          'message'=>'Cotizacion enviada correctamente a '.$cotizacion->usuario->email
        ];
        return response()->json($data, $data['code']);
    }


    public function sendEmail($cotizacion, $subtotal)
    {
        /*Email al que se mandara la info del Servicio*/
        try {
            $data=[
                 'subtotal'=>$subtotal,
                 'iva'=>16,
                 'total'=>$subtotal*1.16,
                 'idCotizacion'=>$cotizacion->idCotizacion,
                 'detalles'=>$cotizacion->detalles
                ];

            /*Mandar Mail*/
            Mail::send('Email.email', $data, function ($message) {
                $message->from('adrian.cruz.islas@gmail.com', 'Firebull');
                $message->to($this->email)->subject('Resultado de la Cotizacion');
            });
        } catch (Exception $e) {
            Session::flash('message', 'Servicio agregado. Posible email incorrecto');
            Session::flash('class', 'warning');
        }
    }

    public function testEmail()
    {
        /*Mandar Mail*/
        $cotizacion=Cotizacion::find(2);
        $data=[
          'subtotal'=>30,
          'idCotizacion'=> 2,
          'detalles'=>$cotizacion->detalles
        ];


        Mail::send('Email.email', $data, function ($message) {
            $message->from('adrian.cruz.islas@gmail.com', 'Adrian');
            $message->to('adrian.cruz.islas@gmail.com')->subject('Test de email');
        });
        return 'OK';
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

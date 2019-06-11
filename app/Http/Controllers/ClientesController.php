<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;
use App\Cliente;
use Validator;

class ClientesController extends Controller
{
    public function index()
    {
        $clientes=Cliente::paginate(6);
        return view('Clientes.clientes', compact('clientes'));
    }

    public function show($idUsuario)
    {
        $cliente=Cliente::where('idUsuario', $idUsuario)->first();

        if (is_object($cliente)) {
            $data=[
            'estatus'=>'success',
            'code'=>200,
            'cliente'=>$cliente,
            'idEstado'=>$cliente->ciudad->estado->idEstado,
            'message'=>'Cliente encontrado'
          ];
        } else {
            $data=[
            'estatus'=>'error',
            'code'=>404,
            'message'=>'El usuario con el id, no esta registrado como cliente frecuente'
          ];
        }

        return response()->json($data, $data['code']);
    }

    public function storage(Request $request)
    {
        $cliente=new Cliente();

        /*Funcion retorna el nombre, o una data
        con informacion del error de validacion*/
        $nombre=$this->validarImagen($request);

        if (!is_array($nombre)) {
            //Mandar a BD solo el nombre
            $cliente->logo=$nombre;
        } else {
            return response()->json($nombre, $nombre['code']);
        }

        $cliente->nombre=$request->nombre;
        $cliente->email=$request->email;
        $cliente->telefono=$request->telefono;
        $cliente->idUsuario=\Auth::user()->id;
        $cliente->idCiudad=$request->ciudad;
        $cliente->direccion=$request->direccion;
        $cliente->RFC=$request->rfc;
        $cliente->url=$request->url;

        if ($cliente->save()) {
            if ($request->file('imagen')) {
                $file=$request->file('imagen');
                $nombre = $file->getClientOriginalName();
                $file->move(public_path().'/imagenes/', $nombre);
            }
            $data=[
                  'estatus'=>'success',
                  'code'=>200,
                  'message'=>'Informacion relacionada correctamente'
                ];
        } else {
            $data=[
                  'message'=> 'Ha ocurrido un problema al intentar almacenar sus datos',
                  'estatus'=> 'danger',
                  'code'=>404
                ];
        }
        return response()->json($data, $data['code']);
    }


    public function update(Request $request, $id)
    {
        $cliente=Cliente::where('idUsuario', \Auth::user()->id)->first();

        if ($request->file('imagen')) {
            /*Funcion retorna el nombre, o una data
            con informacion del error de validacion*/
            $nombre=$this->validarImagen($request);

            if (!is_array($nombre)) {
                //Mandar a BD solo el nombre
                $cliente->logo=$nombre;
            } else {
                return response()->json($nombre, $nombre['code']);
            }
        }
        $cliente->nombre=$request->nombre;
        $cliente->email=$request->email;
        $cliente->telefono=$request->telefono;
//        $cliente->idUsuario=\Auth::user()->id;
        $cliente->idCiudad=$request->ciudad;
        $cliente->direccion=$request->direccion;
        $cliente->RFC=$request->rfc;
        $cliente->url=$request->url;

        if ($cliente->save()) {
            if ($request->file('imagen')) {
                $file=$request->file('imagen');
                $nombre = $file->getClientOriginalName();
                $file->move(public_path().'/imagenes/', $nombre);
            }
            $data=[
                'estatus'=>'success',
                'code'=>200,
                'message'=>'Informacion actualizada correctamente'
              ];
        } else {
            $data=[
                'message'=> 'Ha ocurrido un problema al intentar actualizar',
                'estatus'=> 'danger',
                'code'=>404
              ];
        }
        return response()->json($data, $data['code']);
    }

    public function validarImagen($request)
    {
        if ($request->file('imagen')) {
            $file=$request->file('imagen');
            $nombre = $file->getClientOriginalName();

            $archivo = array('image' => Input::file('imagen'));
            //Reglas de valdiacion para la imagen
            $reglas = array('image' => 'mimes:png,jpeg,jpg,bmp|max:3000');

            $validar=Validator::make($archivo, $reglas);

            if ($validar->fails()) {
                $data=[
                  'message'=>'Formato de imagen (png, jpg, bmp) incorrecto o tamaño excedido (Max 3Mb)',
                  'estatus'=>'warning',
                  'code'=> 400
                ];
                return $data;
            } else {
                return $nombre;
            }
        }
        return 'no disponible.png';
    }
}

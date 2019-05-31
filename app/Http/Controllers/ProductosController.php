<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;
use App\Producto;
use Redirect;
use Validator;
use Session;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $session;

    public function index()
    {
        $this->session=\Auth::check();
        return view('Productos.productos');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $producto=new producto;

        $producto->producto=Input::get('producto');
        $producto->descripcion=Input::get('descripcion');

        $file=$request->file('imagen');

        $archivo= array('image' => Input::file('imagen'));

        //Reglas de valdiacion para la imagen
        $reglas = array(
                'image' => 'mimes:png,jpeg,jpg,bmp'
        );

        $validar=Validator::make($archivo, $reglas);

        if ($validar->fails()) {
            Session::flash('message', 'Formato de imagen o tamaño excedido (png, jpg, bmp)');
            Session::flash('class', 'danger');
        } else {
            //Nombre original del archivo
            $nombre = $file->getClientOriginalName();

            //Mandar a BD solo el nombre
            $producto->rutaimagen=$nombre;

            if ($producto->save()) {
                $file->move(public_path().'/imagenes/', $nombre);
                Session::flash('message', 'Producto guradado');
                Session::flash('class', 'success');
            } else {
                Session::flash('message', 'Ha ocurrido un error');
                Session::flash('class', 'danger');
            }
        }

        return Redirect::to('/createp');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function show($idCategoria)
    {
        $session=\Auth::check();
        $productos=Producto::where('idCategoria', $idCategoria)->get();
        $data=[
          'code'=>200,
          'estatus'=>'success',
          'productos'=> $productos,
          'session'=> $session
        ];
        return response()->json($data, $data['code']);
    }

    public function find($producto)
    {
        $session=\Auth::check();
        $productos=Producto::where('producto', 'like', ['%'.$producto.'%'])
        ->orWhere('descripcion', 'like', ['%'.$producto.'%'])->get();
        $cantidad=count($productos);
        if (is_object($productos) && $cantidad>0) {
            $data=[
            'estatus'=>'success',
            'code'=>200,
            'cantidad'=>$cantidad,
            'message'=>'Se encontraron '.$cantidad.' posibles resultados',
            'productos'=>$productos,
            'session'=>$session
          ];
        } else {
            $data=[
            'estatus'=>'warning',
            'code'=>404,
            'message'=>'No se encontraron resultados',
            'productos'=>$productos,
            'session'=>$session
          ];
        }

        return response()->json($data, $data['code']);
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;
use App\Producto;
use App\Categoria;
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
    public function create(Request $request)
    {
        $productos= Producto::paginate(5);

        if ($request->ajax()) {
            return response()->json(view('Productos.crear', compact('productos'))->render());
        }
        //return dd($productos);
        return view('Productos.crear', compact('productos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $producto=new Producto();

        $producto->producto=$request->producto;
        $producto->idCategoria=$request->categoria;

        if ($request->has('descripcion')) {
            $producto->descripcion=$request->descripcion;
        }

        if ($request->file('imagen')) {
            $file=$request->file('imagen');
            $nombre = $file->getClientOriginalName();
        }

        $archivo = array('image' => Input::file('imagen'));
        //Reglas de valdiacion para la imagen
        $reglas = array(
                'image' => 'mimes:png,jpeg,jpg,bmp|max:3000'
        );

        $validar=Validator::make($archivo, $reglas);

        if ($validar->fails()) {
            $data=[
              'message'=>'Formato de imagen o tamaño excedido (png, jpg, bmp)',
              'estatus'=>'warning',
              'code'=> 400
            ];
        } else {
            //Mandar a BD solo el nombre
            $producto->imagen=$nombre;

            if ($producto->save()) {
                $file->move(public_path().'/imagenes/', $nombre);
                $data=[
                  'estatus'=>'success',
                  'code'=>200,
                  'message'=>$producto->producto.' almacenado correctamente'
                ];
            } else {
                $data=[
                  'message'=> 'Ha ocurrido un problema al intentar guardar',
                  'estatus'=> 'danger',
                  'code'=>404
                ];
            }
        }
        return response()->json($data, $data['code']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producto=Producto::find($id);
        return response()->json($producto, 200);
    }

    public function showByCategoria($idCategoria)
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

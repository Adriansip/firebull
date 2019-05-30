<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Cliente; //Modelo

class ClientesController extends Controller
{
    public function index()
    {
        $clientes=Cliente::paginate(6);
        return view('Clientes.clientes', compact('clientes'));
    }
}

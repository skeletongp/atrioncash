<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    
    public function index()
    {
        $status="Activos";
        return view('pages.clientes.index')
        ->with([
            'status'=>$status
        ]);
    }

    
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        //
    }

  
    public function show(Cliente $cliente)
    {
        //
    }

    public function edit(Cliente $cliente)
    {
        //
    }

    
    public function update(Request $request, Cliente $cliente)
    {
        //
    }

    
    public function destroy(Cliente $cliente)
    {
        //
    }
}

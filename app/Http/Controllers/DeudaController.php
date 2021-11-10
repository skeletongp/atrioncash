<?php

namespace App\Http\Controllers;

use App\Http\Methods\Metodos;
use App\Models\Deuda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeudaController extends Controller
{


    public function __construct() {
       
    }
    
    public function index()
    {
        $negocio = Auth::user()->negocio;
        $deudas=$negocio->deudas()->paginate(9);

        return view('pages.deudas.index')
        ->with([
            'deudas'=>$deudas
        ]);
    }

    
    public function create()
    {
        $negocio=Auth::user()->negocio;
        $clientes=$negocio->clientes;
        return view('pages.deudas.create')
        ->with([
            'clientes'=>$clientes
        ]);
    }

   
    public function store(Request $request)
    {
       $data=$request->all();
       $cliente_id=$data['cliente_id'];
       $data['negocio_id']=Auth::user()->negocio_id;
       $metodo=new Metodos();
        $metodo->crearDeuda($data, $cliente_id);
        return redirect()->route('deudas.index');
    }

   
    public function show(Deuda $deuda)
    {
        $cuotas=$deuda->Cuotas()->where('status','pendiente')->paginate(9);
        $pendiente=$deuda->Cuotas()->where('status','=','pendiente')->first();
        return view('pages.deudas.show')
        ->with([
            'deuda'=>$deuda,
            'cuotas'=>$cuotas,
            'pendiente'=>$pendiente,
        ]);
    }

   
    public function edit(Deuda $deuda)
    {
        //
    }

   
    public function update(Request $request, Deuda $deuda)
    {
        //
    }

    
    public function destroy(Deuda $deuda)
    {
        //
    }
}

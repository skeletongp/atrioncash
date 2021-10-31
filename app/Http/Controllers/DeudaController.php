<?php

namespace App\Http\Controllers;

use App\Models\Deuda;
use Illuminate\Http\Request;

class DeudaController extends Controller
{
    
    public function index()
    {
        //
    }

    
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        dd($request->all());
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

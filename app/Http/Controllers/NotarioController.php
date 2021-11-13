<?php

namespace App\Http\Controllers;

use App\Models\Municipio;
use App\Models\Notario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotarioController extends Controller
{
 
    public function index()
    {
        $negocio=Auth::user()->negocio;
        $notarios=$negocio->notarios;
        return view('pages.notarios.index')
        ->with([
            'notarios'=>$notarios
        ]);
    }

    public function create()
    {
        $municipios=Municipio::orderBy('nombre')->get();
        return view('pages.notarios.create')
        ->with([
            'municipios'=>$municipios
        ]);
    }
    
    protected $rules=[
        'matricula'=>'unique:notarios,matricula',
        'cedula'=>'unique:notarios,cedula',
    ];
    public function store(Request $request)
    {
        $request->validate($this->rules);
        Notario::create($request->all());
        return redirect()->route('notarios.index');
    }

    public function show(Notario $notario)
    {
        //
    }

    
    public function edit(Notario $notario)
    {
        //
    }

    public function update(Request $request, Notario $notario)
    {
        //
    }

   
    public function destroy(Notario $notario)
    {
        //
    }
}

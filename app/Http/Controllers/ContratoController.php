<?php

namespace App\Http\Controllers;

use App\Models\Deuda;
use App\Models\Notario;
use App\Models\Contrato;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use NumberFormatter;

class ContratoController extends Controller
{
    
    public function index()
    {
        return view('pages.contratos.index');
    }

    
    public function create()
    {
        $negocio=Auth::user()->negocio;
        $deudas=$negocio->deudas;
        $notarios=$negocio->notarios;
        return view('pages.contratos.create')
        ->with([
            'deudas'=>$deudas,
            'notarios'=>$notarios,
        ]);
    }

    public function store(Request $request)
    {
        $deuda=Deuda::find($request->deuda_id);
        if ($deuda->contrato) {
            return redirect()->route('contratos.show', $deuda->contrato);
        }
        $notario=Notario::find($request->notario_id);
        if ($deuda->type==='redito') {
            return $deuda;
        }
       $contrato=Contrato::create([
            'user_id'=>Auth::user()->id,
            'cliente_id'=>$deuda->cliente_id,
            'deuda_id'=>$deuda->id,
            'notario_id'=>$notario->id,
            'negocio_id'=>$notario->negocio_id,
        ]);
        return redirect()->route('contratos.show', $contrato);
    }

  
    public function show(Contrato $contrato)
    {
        $deuda=$contrato->deuda;
       
            return redirect()->route('contratos.contrato_cuota', $contrato);
        
    }

    public function edit($id)
    {
        //
    }

 
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }
    public function contrato_cuota(Contrato $contrato)
    {
 
     $date=date_create($contrato->created_at);
    $meses=['January'=>'ENERO','february'=>'FEBRERO','March'=>'MARZO','May'=>'MAYO','June'=>'JUNIO','August'=>'AGOSTO','September'=>'SEPTIEMBRE','October'=>'OCTUBRE','November'=>'NOVIEMBRE','December'=>'DICIEMBRE'];
    $f = new NumberFormatter("es", NumberFormatter::SPELLOUT);
    $año=$f->format(date_format($date,'Y'));
    $dia=$f->format(date_format($date,'d'));
 
 
    return view('pages.pdfs.contrato_cuota')
       ->with([
           'contrato'=>$contrato,
           'mes'=>$meses[date_format($date,'F')],
           'date'=>$date,
           'año'=>strtoupper($año),
           'dia'=>strtoupper($dia),
           'f'=>$f
       ]);
    }
}

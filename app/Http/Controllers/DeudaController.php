<?php

namespace App\Http\Controllers;

use App\Http\Methods\Metodos;
use App\Http\Methods\Metodos2;
use App\Models\Deuda;
use Illuminate\Http\Request; use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\Auth;

class DeudaController extends Controller
{

    public $met;

    public function __construct() {
       $this->met=new Metodos();
       $this->middleware('role:owner')->except('index','activos','historial','atrasados','show');
    }
    
    public function index()
    {
        $negocio = Auth::user()->negocio;
        $query=$negocio->deudas()->orderBy('saldo_actual','desc');
        $deudas = $this->met->queryFiltrado(null, $query );
        return view('pages.deudas.index')
        ->with([
            'deudas'=>$deudas
        ]);
    }
    /* Vistas de deudas filtradas */
    public function activos()
    {
        $status = "Activos";
        $query=Auth::user()->negocio->deudas();
        $deudas = $this->met->queryFiltrado($status, $query);
        return view('pages.deudas.index')
            ->with([
                'deudas' => $deudas,
            ]);
    }
    public function atrasados()
    {
        $status = "Atrasados";
        $query=Auth::user()->negocio->deudas();
        $deudas = $this->met->queryFiltrado($status, $query);
        return view('pages.deudas.index')
            ->with([
                'deudas' => $deudas,
            ]);
    }
    public function historial()
    {
        $status = "Historial";
        $query=Auth::user()->negocio->deudas();
        $deudas = $this->met->queryFiltrado($status, $query);
        return view('pages.deudas.index')
            ->with([
                'deudas' => $deudas,
            ]);
    }

    /* Fin del filtro */

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
       $data['id']=Uuid::uuid1();
       $metodo=new Metodos();
        $deuda=$metodo->crearDeuda($data, $cliente_id);

        return redirect()->route('deudas.index');
    }

   
    public function show(Deuda $deuda)
    {
        $cuotas=$deuda->Cuotas()->orderBy('updated_at')->orderBy('fecha')->paginate(9);
        $porpagar=$deuda->Cuotas()->where('status','pendiente');
        $pendiente=$deuda->Cuotas()->where('status','=','pendiente')->first();
        $notarios=$deuda->negocio->notarios;
        return view('pages.deudas.show')
        ->with([
            'deuda'=>$deuda,
            'cuotas'=>$cuotas,
            'pendiente'=>$pendiente,
            'porpagar'=>$porpagar,
            'notarios'=>$notarios,
        ]);
    }

    
    
    public function destroy(Deuda $deuda)
    {
        //
    }

    /* Cotizaciones */
    public function cotizar()
    {
        return view('pages.deudas.cotizar');
    }
    public function cotizar_store(Request $request)
    {
        $met=new Metodos();
        $met2=new Metodos2();
        $data=$met->amortizar($request->deuda, $request->interes, $request->cuotas);
        $fecha=$request->fecha;
        foreach ($data->pagos as $pago) {
            $pago->fecha=$met2->sumarfecha($fecha, $request->periodicidad);
            $fecha=$met2->sumarfecha($fecha, $request->periodicidad);
        }
        return view('pages.pdfs.cotizacion')
        ->with([
            'data'=>$data,
            'deuda'=>$request->deuda
        ]);
    }
}

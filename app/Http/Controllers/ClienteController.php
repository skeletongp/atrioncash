<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use App\Http\Methods\Metodos;
use App\Models\Cuota;
use App\Models\Deuda;
use Illuminate\Support\Facades\Auth;

class ClienteController extends Controller
{

    public function index()
    {
        $status = "Activos";
        $negocio = Auth::user()->negocio;
        switch ($status) {
            case 'Activos':
                $clientes = $negocio->clientes()->paginate(6);
                break;
            case 'Atrasados':
                $clientes = $negocio->clientes()->where('status', '=', 'atrasado')->paginate(6);
                break;
            case 'Historial':
                $clientes = $negocio->clientes()->whithTrashed()->paginate(6);
                break;
        }
        return view('pages.clientes.index')
            ->with([
                'status' => $status,
                'clientes' => $clientes,
            ]);
    }


    public function create()
    {
        return view('pages.clientes.create');
    }


    public function store(Request $request)
    {
        $data = $request->all();
        $data['status'] = 'al día';
        $data['phone'] = str_replace('-', '', $data['phone']);
        $negocio = Auth::user()->negocio;
        if ($negocio->balance->saldo_actual >= $data['deuda']) {
            $clienteData = array_diff($data, [$data['interes'], $data['cuotas'], $data['periodicidad'], $data['fecha'], $data['type']]);
            $clienteData['negocio_id']=$negocio->id;
            $cliente = Cliente::create($clienteData);
            $method = new Metodos();
            $method->crearDeuda($data, $cliente->id);
            return redirect()->route('clientes.index');
        } else {
            return redirect()->back()->with([
                'error'=>'No tiene saldo suficiente para prestar'
            ]);
        }
    }




    public function show(Cliente $cliente)
    {
        return view('pages.clientes.show')
        ->with([
            'cliente'=>$cliente
        ]);
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

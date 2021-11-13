<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Http\Methods\Metodos;
use App\Http\Requests\ClienteRequest;
use Illuminate\Support\Facades\Auth;

class ClienteController extends Controller
{
    public $met;
    public function __construct() {
        $this->met=new Metodos();
    }
    public function index()
    {
        $query=Auth::user()->negocio->clientes();
        $clientes = $this->met->queryFiltrado(null, $query );

        return view('pages.clientes.index')
            ->with([
                'clientes' => $clientes,
            ]);
    }

    /* Vistas de clientes filtrados */
    public function activos()
    {
        $status = "Activos";
        $query=Auth::user()->negocio->clientes();
        $clientes = $this->met->queryFiltrado($status, $query);
        return view('pages.clientes.index')
            ->with([
                'clientes' => $clientes,
            ]);
    }
    public function atrasados()
    {
        $status = "Atrasados";
        $query=Auth::user()->negocio->clientes();
        $clientes = $this->met->queryFiltrado($status, $query);
        return view('pages.clientes.index')
            ->with([
                'clientes' => $clientes,
            ]);
    }
    public function historial()
    {
        $status = "Historial";
        $query=Auth::user()->negocio->clientes();
        $clientes = $this->met->queryFiltrado($status, $query);
        return view('pages.clientes.index')
            ->with([
                'clientes' => $clientes,
            ]);
    }
    /* Fin de las vistas filtradas */

    public function create()
    {
        return view('pages.clientes.create');
    }

    public function store(ClienteRequest $request)
    {
        request()->request->remove('trial');
        $data = $request->all();
        $data['status'] = 'al día';
        $data['phone'] = str_replace('-', '', $data['phone']);
        $negocio = Auth::user()->negocio;
        $data['negocio_id'] = $negocio->id;
        Cliente::create($data);
        return redirect()->route('clientes.index');
    }

    public $cliente_id;

  
    public function show(Cliente $cliente)
    {
        return view('pages.clientes.show')
            ->with([
                'cliente' => $cliente
            ]);
    }
    public function edit(Cliente $cliente)
    {
        return view('pages.clientes.edit')
            ->with([
                'cliente' => $cliente
            ]);
    }

    public function update(ClienteRequest $request, Cliente $cliente)
    {
        request()->request->remove('trial');
     
        $data = $request->all();
        unset($data['cliente_id']);
        $data['phone'] = str_replace('-', '', $data['phone']);
        $cliente->update($data);
        return redirect()->route('clientes.show', $cliente);
    }


    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return redirect()->route('clientes.index');
    }
}

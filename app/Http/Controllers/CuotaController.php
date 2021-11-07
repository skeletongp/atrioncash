<?php

namespace App\Http\Controllers;

use App\Http\Methods\Metodos2;
use App\Models\Cuota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CuotaController extends Controller
{
    public $metodo;
   public function __construct() {
       $this->metodo = new Metodos2();
   }
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
        //
    }

    
    public function show(Cuota $cuota)
    {
        //
    }

    
    public function edit(Cuota $cuota)
    {
        //
    }

    
    public function update(Request $request, Cuota $cuota)
    {
        $negocio=$cuota->negocio;
        $balance=$negocio->balance;
        $deuda=$cuota->deuda;
        $cliente=$deuda->cliente;
        $user=Auth::user();
        $cuota->status='pagado';
        $cuota->save();
        $this->metodo->cobrarCuota($negocio, $cuota, $balance, $deuda, $cliente, $user);
        return $this->metodo->printPayedTicket($cuota, $user, $cliente, $negocio);
    }

   
    public function destroy(Cuota $cuota)
    {
        //
    }
    
}

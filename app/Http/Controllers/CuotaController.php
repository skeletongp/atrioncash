<?php

namespace App\Http\Controllers;

use App\Events\Cobros;
use App\Http\Methods\Metodos2;
use App\Models\Cuota;
use Illuminate\Http\Request; use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\Auth;

class CuotaController extends Controller
{
    public $metodo;
    public function __construct()
    {
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
        if ($cuota->status != 'pagado') {

            $negocio = $cuota->negocio;
            $deuda = $cuota->deuda;
            $balance = $negocio->balance;
            $cliente = $deuda->cliente;
            $user = Auth::user();
            if ($deuda->type === 'cuota') {
                $cuota->status = 'pagado';
                $cuota->save();
                $this->metodo->cobrarCuota($negocio, $cuota, $balance, $deuda, $cliente, $user, $request);
            } else {
                $cuota->saldo = $cuota->saldo - $request->capital;
                $cuota->interes = $cuota->saldo * ($deuda->interes/100);
                $cuota->capital = $cuota->capital - $request->capital;
                $cuota->deber = $cuota->saldo * (1 + ($deuda->interes / 100));
                $cuota->fecha=$this->metodo->sumarfecha($cuota->fecha, $deuda->periodicidad);
                if ($cuota->saldo == 0) {
                    $cuota->status = 'pagado';
                }
                $cuota->save();
                $this->metodo->cobrarCuota($negocio, $cuota, $balance, $deuda, $cliente, $user, $request);
            }
        }
        broadcast(new Cobros($user));
        return redirect()->route('deudas.show', $deuda);
        return $this->metodo->printPayedTicket($cuota, $user, $cliente, $negocio);
    }


    public function destroy(Cuota $cuota)
    {
        //
    }
}

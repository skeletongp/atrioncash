<?php

namespace App\Http\Methods;

use App\Models\Balance;
use App\Models\Negocio;
use App\Models\Partida;
use App\Models\Plan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class Metodos2
{
    public function cobrarCuota($negocio, $cuota, $balance, $deuda, $cliente, $user, Request $request)
    {
        /* Ajuste del Balance del negocio */
        $balance->saldo_actual = $balance->saldo_actual + $request->capital + $request->interes;
        $balance->capital_cobrado = $balance->capital_cobrado + $request->capital;
        $balance->capital_prestado = $balance->capital_prestado - $request->capital;
        $balance->interes_cobrado = $balance->interes_cobrado + $request->interes;
        $balance->save();

        /* Ajuste de Saldo de la deuda */
        $deuda->saldo_actual = $deuda->saldo_actual - $request->capital;
        $deuda->save();

        /* Ajustar deduda del cliente */
        $met=new Metodos();
        $met->ajustarDeudaCliente($deuda->cliente_id, $request->capital, "resta");

        /* Ajuste de Partida */
        Partida::create([
            'salida' => 0,
            'entrada' => $request->capital + $request->interes,
            'fecha' => date('Y-m-d'),
            'cliente_id' => $cliente->id,
            'user_id' => $user->id,
            'negocio_id' => $negocio->id
        ]);
    }
    public function printPayedTicket($cuota, $user, $cliente, $negocio)
    {
        $status = 1;
        if (Carbon::createFromDate($cuota->fecha) < date('d-m-y')) {
            $status = 0;
        };
        return view('pages.pdfs.payed_tickets')

            ->with([
                'cuota' => $cuota,
                'user' => $user,
                'cliente' => $cliente,
                'negocio' => $negocio,
                'status' => $status,
            ]);
    }
    public function sumarfecha($fecha, $tiempo)
    {
        $fecha = Carbon::createFromDate($fecha);
        switch ($tiempo) {
            case 'diario':
                $fecha->addDay();
                $fecha_db = $fecha->toDateString();
                break;
            case 'semanal':
                $fecha->addWeek();
                $fecha_db = $fecha->toDateString();
                break;
            case 'quincenal':
                $fecha->addDays(15);
                $fecha_db = $fecha->toDateString();
                break;
            case 'mensual':
                $fecha->addMonth();
                $fecha_db = $fecha->toDateString();
                break;
        }
        return $fecha_db;
    }
    public function createBalance($balance)
    {
        $balance = Balance::create([
            'saldo_inicial' => $balance,
            'saldo_actual' => $balance,
            'capital_cobrado' => 0,
            'capital_prestado' => 0,
            'interes_cobrado' => 0,

        ]);
        return $balance;
    }
    public function createNegocio($data)
    {
        $balance = $this->createBalance($data['balance']);
        $negocio = Negocio::create([
            'name' => $data['Nname'],
            'address' => $data['address'],
            'phone' => $data['Nphone'],
            'balance_id' => $balance->id,
        ]);
        return $negocio;
    }
    public function suscribe(Plan $plan)
    {
        $negocio=Auth::user()->negocio;
        $prox_pago=$this->getProxPago($plan->periodo);
        $negocio->plan()->sync([$plan->id=>['status'=>'activo','prox_pago'=>$prox_pago]]);
    }
    public function getProxPago($periodo)
    {
        $fecha = Carbon::createFromDate(now());
        switch ($periodo) {
            case 'mensual':
                $prox_pago = $fecha->addMonth();
                break;
            case 'semestral':
                $prox_pago = $fecha->addMonths(6);
                break;
            case 'anual':
                $prox_pago = $fecha->addYear();
                break;
        }
        return $prox_pago;
    }
}

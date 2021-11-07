<?php

namespace App\Http\Methods;

use App\Models\Partida;
use Carbon\Carbon;
use PDF;

class Metodos2
{
    public function cobrarCuota($negocio, $cuota, $balance, $deuda, $cliente, $user)
    {
        /* Ajuste del Balance del negocio */
        $balance->saldo_actual = $balance->saldo_actual + $cuota->deber;
        $balance->capital_cobrado = $balance->capital_cobrado + $cuota->capital;
        $balance->capital_prestado = $balance->capital_prestado - $cuota->capital;
        $balance->interes_cobrado = $balance->interes_cobrado + $cuota->interes;
        $balance->save();

        /* Ajuste de Deuda del Cliente */
        $deuda->saldo_actual = $deuda->saldo_actual - $cuota->capital;
        $deuda->save();

        /* Ajuste de Partida */
        Partida::create([
            'salida' => 0,
            'entrada' => $cuota->deber,
            'fecha' => date('Y-m-d'),
            'cliente_id' => $cliente->id,
            'user_id' => $user->id,
            'negocio_id' => $negocio->id
        ]);
    }
    public function printPayedTicket($cuota, $user, $cliente, $negocio)
    {
        $status=1;
        if(Carbon::createFromDate($cuota->fecha)<date('d-m-y')){
           $status=0; 
        };
        $pdf = PDF::loadView(
            'pages.pdfs.payed_tickets',
            [
                'cuota' => $cuota,
                'user' => $user,
                'cliente' => $cliente,
                'negocio' => $negocio,
                'status' => $status,
            ]
        );
        return $pdf->stream(substr($cliente->name, 0, 3) . '_' . date('H_i_s') . '_' . $cuota->id . '.pdf');
    }
}

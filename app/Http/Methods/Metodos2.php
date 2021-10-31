<?php

namespace App\Http\Methods;

use App\Models\Partida;

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
            'salida'=>0,
            'entrada'=>$cuota->deber,
            'fecha'=>date('Y-m-d'),
            'cliente_id'=>$cliente->id,
            'user_id'=>$user->id,
            'negocio_id'=>$negocio->id
        ]);
    }
}

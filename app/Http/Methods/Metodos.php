<?php

namespace App\Http\Methods;

use App\Models\Cuota;
use App\Models\Deuda;
use App\Models\Partida;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class Metodos
{
    public function amortizar($deuda, $interes, $cuotas)
    {
        $interes = ($interes / 100);
        $m = ($deuda * $interes * (pow((1 + $interes), ($cuotas)))) / ((pow((1 + $interes), ($cuotas))) - 1);
        $m = round($m, 2);
        $pagos = [];
        $saldo_inicial = $deuda;
        $suma = 0;
        for ($i = 0; $i < $cuotas; $i++) {
            $int = $saldo_inicial * ($interes / 100);
            $capital = $m - ($int * 100);
            $cuota = $m;
            $saldo_final = round($saldo_inicial - $capital, 2);
            $suma += $m;
            array_push(
                $pagos,
                [
                    'saldo' => round($saldo_inicial),
                    'interes' => round($int * 100),
                    'capital' => round($capital),
                    'deber' => round($cuota),
                    'restante' => round($saldo_final),
                ]
            );
            $saldo_inicial = $saldo_final;
        }
        $pagos = json_decode(json_encode($pagos));
        $suma = json_decode(json_encode($suma));
        $data = json_decode(json_encode(["pagos" => $pagos, "suma" => $suma]));
        return json_decode(json_encode($data));;
    }

    public function crearDeuda($data, $cliente_id)
    {
        if ($data['type']=='redito') {
            $data['cuotas']=1;
        }
       $deuda= Deuda::create(
            [
                'saldo_inicial' => $data['deuda'],
                'saldo_actual' => $data['deuda'],
                'interes' => $data['interes'],
                'cuotas' => $data['cuotas'],
                'negocio_id' => $data['negocio_id'],
                'periodicidad' => $data['periodicidad'],
                'type' => $data['type'],
                'cliente_id' => $cliente_id,
            ]
        );
        $amortizacion = $this->amortizar($data['deuda'], $data['interes'], $data['cuotas']);
        $this->crearCuotas($amortizacion, $data, $deuda->id);
        $this->restarCapital($deuda->saldo_inicial);
        $this->agregarPartida(0, $deuda->saldo_inicial, $cliente_id);
        return redirect()->route('clientes.index');
    }

    public function restarCapital($deuda)
    {
        $balance=Auth::user()->negocio->balance;
        $balance->saldo_actual=$balance->saldo_actual-$deuda;
        $balance->capital_prestado=$balance->capital_prestado+$deuda;
        $balance->save();
    }
    public function agregarPartida($entrada=0, $salida=0,$cliente_id )
    {
        $user=Auth::user();
        Partida::create([
            'entrada'=>$entrada,
            'salida'=>$salida,
            'fecha'=>date('Y-m-d'),
            'cliente_id'=>$cliente_id,
            'user_id'=>$user->id,
            'negocio_id'=>$user->negocio_id,
        ]);
    }
    public function crearCuotas($amortizacion,$data, $deuda_id)
    {
        $fecha = Carbon::createFromDate($data['fecha']);
        foreach ($amortizacion->pagos as $pago) {
            switch ($data['periodicidad']) {
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
            Cuota::create([
                'saldo' => $pago->saldo,
                'status' => 'pendiente',
                'fecha'=>$fecha_db,
                'capital' => $pago->capital,
                'restante' => $pago->restante,
                'deber' => $pago->deber,
                'deuda_id' => $deuda_id,
                'negocio_id' => $data['negocio_id'],
                'interes' => $pago->interes,

            ]);
        }
    }
}

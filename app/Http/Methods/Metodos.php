<?php

namespace App\Http\Methods;

use App\Models\Cliente;
use App\Models\Cuota;
use App\Models\Deuda;
use App\Models\Partida;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Uuid;

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
        if ($data['type'] == 'redito') {
            $data['cuotas'] = 1;
        }
        $deuda = Deuda::create(
            [
                'id'=>Uuid::uuid1(),
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
        $this->ajustarDeudaCliente($cliente_id, $data['deuda']);
        $this->crearCuotas($amortizacion, $data, $deuda->id, $cliente_id);
        $this->restarCapital($deuda->saldo_inicial);
        $this->agregarPartida(0, $deuda->saldo_inicial, $cliente_id);
        return $deuda;
    }

    public function ajustarDeudaCliente($cliente_id, $monto, $tipo = "suma")
    {
        $cliente = Cliente::find($cliente_id);
        if ($tipo == 'suma') {
            $cliente->deuda = $cliente->deuda + $monto;
        } else {
            $cliente->deuda = $cliente->deuda - $monto;
        }
        $cliente->save();
    }
    public function ajustarSaldoUsuario($user_id, $monto, $tipo = "suma")
    {
        $user = User::find($user_id);
        if ($tipo == 'suma') {
            $user->saldo = $user->saldo + $monto;
        } else {
            $user->saldo = $user->saldo - $monto;
        }
        $user->save();
    }
    public function restarCapital($deuda)
    {
        $balance = Auth::user()->negocio->balance;
        $balance->saldo_actual = $balance->saldo_actual - $deuda;
        $balance->capital_prestado = $balance->capital_prestado + $deuda;
        $balance->save();
    }
    public function agregarPartida($entrada = 0, $salida = 0, $cliente_id)
    {
        $user = Auth::user();
        Partida::create([
            'id'=>Uuid::uuid1(),
            'entrada' => $entrada,
            'salida' => $salida,
            'fecha' => date('Y-m-d'),
            'cliente_id' => $cliente_id,
            'user_id' => $user->id,
            'negocio_id' => $user->negocio_id,
        ]);
    }
    public function crearCuotas($amortizacion, $data, $deuda_id, $cliente_id)
    {
        $fecha = Carbon::createFromDate($data['fecha']);
        $met = new Metodos2();
        foreach ($amortizacion->pagos as $pago) {
            $fecha_db = $met->sumarfecha($fecha, $data['periodicidad']);
            Cuota::create([
                'id'=>Uuid::uuid1(),
                'saldo' => $pago->saldo,
                'status' => 'pendiente',
                'fecha' => $fecha_db,
                'capital' => $pago->capital,
                'restante' => $pago->restante,
                'deber' => $pago->deber,
                'deuda_id' => $deuda_id,
                'negocio_id' => $data['negocio_id'],
                'cliente_id' => $cliente_id,
                'interes' => $pago->interes,
            ]);
            $fecha = $fecha_db;
        }
    }
    public function queryFiltrado($status = null, HasMany $query)
    {
        $campoDeuda="deuda";
        if ($query->getQualifiedForeignKeyName()=='deudas.negocio_id') {
            $campoDeuda="saldo_actual";
        }
        switch ($status) {
            case 'Activos':
                $query = $query->search(request('s'))->where($campoDeuda, '>', 50)->orderBY('id')->get();
                $query = $query->filter(function ($query) {
                    return $query->estado == 'al día';
                });
                break;
            case 'Atrasados':
                $query = $query->search(request('s'))->where($campoDeuda, '>', 50)->orderBY('id')->get();
                $query = $query->filter(function ($query) {
                    return $query->estado == 'atrasado';
                });
                break;
            case 'Historial':
                $query = $query->has('cuotas')->search(request('s'))->where($campoDeuda, '<=', 50)->orderBY('id')->get();
                break;
            default:
                $query = $query->search(request('s'))->orderBY('id')->get();
                break;
        }
        $page = Paginator::resolveCurrentPage() ?: 1;
        $perPage = 6;
        $query = new LengthAwarePaginator(
            $query->forPage($page, $perPage),
            $query->count(),
            $perPage,
            $page,
            ['path' => Paginator::resolveCurrentPath()]
        );

        return $query;
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Partida;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Uuid;

class PartidaController extends Controller
{

    public function index($tipo='entrada', $vista='ingresos')
    {
        $negocio = Auth::user()->negocio;
        $partidaInterval = $negocio->partidas()->interval();
        $start = $partidaInterval['start'];
        $end = $partidaInterval['end'];
        $partidas = $partidaInterval['actual']->where($tipo, '>', 0)->paginate(9);
        $suma = $partidaInterval['actual']->sum($tipo);
        return view('pages.partidas.'.$vista)
            ->with([
                'partidas' => $partidas,
                'start' => $start,
                'end' => $end,
                'suma' => $suma,
            ]);
    }

    public function ingresos()
    {
        return $this->index();
    }
    public function egresos()
    {
        return $this->index('salida','egresos');
    }
    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(Partida $partida)
    {
        //
    }


    public function edit(Partida $partida)
    {
        //
    }


    public function update(Request $request, Partida $partida)
    {
        //
    }


    public function destroy(Partida $partida)
    {
        //
    }
}

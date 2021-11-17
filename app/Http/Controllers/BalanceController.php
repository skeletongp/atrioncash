<?php

namespace App\Http\Controllers;

use App\Models\Balance;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Uuid;

class BalanceController extends Controller
{
   
    public function index()
    {
        $start=Carbon::now()->firstOfMonth();
        $end=Carbon::now()->lastOfMonth();
        $start = date('Y-m-d', strtotime($start));
        $end = date('Y-m-d', strtotime($end));
        $negocio=Auth::user()->negocio;
        $partidas=$negocio->partidas()->whereBetween('fecha',[$start, $end])->get();
        return view('pages.partidas.balance')
        ->with([
            'partidas'=>$partidas,
            'balance'=>$negocio->balance,
        ]);

    }

   
  
    public function store(Request $request)
    {
        $balance=Auth::user()->negocio->balance;
        $balance->saldo_actual= $balance->saldo_actual+$request->monto;
        $balance->save();
    }

   
    public function show(Balance $balance)
    {
        //
    }

    
    public function edit(Balance $balance)
    {
        //
    }

    
    public function update(Request $request, Balance $balance)
    {
        //
    }

    
    public function destroy(Balance $balance)
    {
        //
    }
}

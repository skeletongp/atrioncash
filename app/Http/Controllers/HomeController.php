<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\Auth;
use Alert;
use App\Models\Municipio;
use App\Models\Municipios;
use App\Models\Provincia;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    //

    public function index()
    {
        $user = Auth::user();
        $today = Carbon::now();
        $today = $today->toDateString();
        $balance = $user->negocio->balance;
        $clientes = $user->negocio->clientes()->where('deuda','>',50)->get();
        $cuotas = $user->negocio->cuotas;
        $pendientes=$user->negocio->cuotas()->where('fecha',$today);
        
        return view('dashboard')
            ->with([
                "balance" => $balance,
                "clientes" => $clientes,
                "pendientes" => $pendientes,
            ]);
    }

   
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Alert;
use Carbon\Carbon;

class HomeController extends Controller
{
    //

    public function index()
    {
        /*    dd(config('sweetalert.cdn')); */
        Alert::info('Info Title', 'Info Message');
        $user = Auth::user();
        $today = Carbon::now();
        $today = $today->toDateString();
        $balance = $user->negocio->balance;
        $clientes = $user->negocio->clientes;
        $cuotas=$user->negocio->cuotas;
        if ($user->hasRole('owner')) {


            $title1 = "$" . number_format($balance->saldo_actual, 2);
            $subtitle1 = "Dinero en saldo";
            $url1 = '#';
            $icon1 = "fa-dollar-sign";

            $title2 = "$" . number_format($balance->capital_prestado, 2);
            $subtitle2 = "Capital en préstamo";
            $url2 = '#';
            $icon2 = "fa-hand-holding-usd";


            $title3 = $clientes->count('id');
            $subtitle3 = "Clientes activos";
            $url3 = route('clientes.index');
            $icon3 = "fa-users";

            $title4 = $cuotas->where('fecha', '=', $today)->count('id');
            $subtitle4 = "Pagos de hoy pendientes";
            $url4 = '#';
            $icon4 = "fa-users";
        } else {
        }
        return view('dashboard')
            ->with([
                "title1" => $title1,
                "subtitle1" => $subtitle1,
                "url1" => $url1,
                "icon1" => $icon1,

                "title2" => $title2,
                "subtitle2" => $subtitle2,
                "url2" => $url2,
                "icon2" => $icon2,

                "title3" => $title3,
                "subtitle3" => $subtitle3,
                "url3" => $url3,
                "icon3" => $icon3,

                "title4" => $title4,
                "subtitle4" => $subtitle4,
                "url4" => $url4,
                "icon4" => $icon4,
            ]);
    }
}

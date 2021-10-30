<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Alert;
class HomeController extends Controller
{
    //

    public function index()
    {
     /*    dd(config('sweetalert.cdn')); */
        Alert::info('Info Title', 'Info Message');
        $user=Auth::user();
        if ($user->hasRole('owner')) {
            $balance=$user->negocio->balance;
            $clientes=$user->negocio->clientes;
            $title1="$".number_format($balance->saldo_actual,2);
            $subtitle1="Dinero en saldo";
            
            $title2="$".number_format($balance->capital_prestado,2);
            $subtitle2="Capital en préstamo";



        } else {
        }
        return view('dashboard')
        ->with([
            "title1"=>$title1,
            "title2"=>$title2,
            "subtitle1"=>$subtitle1,
            "subtitle2"=>$subtitle2,
        ]);
    }
}

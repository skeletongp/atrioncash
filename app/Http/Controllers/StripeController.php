<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class StripeController extends Controller
{

    /* Devuelve la vista donde el usuario puede contratar el plan */
    public function index()
    {
        
        return view('pages.stripe.index');
    }

    /* Devuelve la vista donde el usuario registra su tarjeta */
    public function card_create()
    {
    }

    /* Permite al usuario suscribirse a un plan */
    public function suscribe(Request $request, $plan)
    {
        
    }

    /* Guarda el método de pago del cliente */
    public function card_save(Request $request)
    {
    
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Methods\Metodos2;
use App\Models\Plan;
use App\Models\User;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\Auth;

class PlanController extends Controller
{
    private $apiContext;
    public function __construct()
    {
        $this->middleware('role:admin')->except('index', 'suscribe');
    }
    public function index()
    {
        $user = auth()->user();
        $negocio = $user->negocio;
        if ($negocio->status === 'activo' && $user->hasRole('admin') == false) {
            return redirect()->route('home');
        }
        $plans = Plan::get();
        return view('pages.plans.index')
            ->with([
                'plans' => $plans
            ]);
    }


    public function create()
    {
        return view('pages.plans.create');
    }

    protected $rules = [
        'name' => 'required|string|unique:plans,name',
        'price' => 'required',
        'periodo' => 'required',
    ];
    public function store(Request $request)
    {
        $request->validate($this->rules);
        request()->request->add(['id' => Uuid::uuid1()]);
        Plan::create($request->all());
        return redirect()->route('plans.index');
    }


    public function show(Plan $plan)
    {
        //
    }


    public function edit(Plan $plan)
    {
        //
    }

    public function update(Request $request, Plan $plan)
    {
        //
    }


    public function destroy(Plan $plan)
    {
        //
    }
    public function suscribe(Plan $plan)
    {
        $met = new Metodos2();

        $met->suscribe($plan);
        return redirect()->route('home');
    }
}

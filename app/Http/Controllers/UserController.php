<?php

namespace App\Http\Controllers;

use App\Http\Methods\Metodos2;
use App\Http\Requests\AuthRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware(['role:admin'])->except('store');
    }
    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(AuthRequest $request)
    {
        $data = $request->all();
        
        $met = new Metodos2();
        $negocio = $met->createNegocio($data);
        $user = User::create([
            'name' => $data['name'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'username' => $data['username'],
            'password' => bcrypt($data['password']),
            'rolename' => 'Administrador',
            'negocio_id' => $negocio->id
        ]);
        $user->syncRoles(['owner']);
       
        return redirect()->route('home');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}

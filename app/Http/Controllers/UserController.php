<?php

namespace App\Http\Controllers;

use App\Http\Methods\Metodos;
use App\Http\Methods\Metodos2;
use App\Http\Requests\AuthRequest;
use App\Models\User;
use Illuminate\Http\Request; use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'role:owner', 'suscribed'])->except('store');
    }
    public function index()
    {
        $negocio = Auth::user()->negocio;
        $users = $negocio->usuarios()->search(request('s'))->paginate(6);
        return view('pages.users.index')
            ->with([
                'users' => $users,
            ]);
    }


    public function create()
    {
        return view('pages.users.create');
    }


    public function store(AuthRequest $request)
    {
        $data = $request->all();
        $met = new Metodos2();
        $roles = ['owner' => 'Administrador', 'employee' => 'Empleado'];
        if (Auth::user()) {
            $negocio = Auth::user()->negocio;
            $role = $request->role;
            $rolename = $roles[$request->role];
        } else {
            $negocio = $met->createNegocio($data);
            $role = 'owner';
            $rolename = 'Administrador';
        }
        $user = User::create([
            'id' => Uuid::uuid1(),
            'name' => $data['name'],
            'lastname' => $data['lastname'],
            'cedula' => $data['cedula'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'username' => $data['username'],
            'password' => bcrypt($data['password']),
            'rolename' => $rolename,
            'negocio_id' => $negocio->id
        ]);
        $user->syncRoles([$role]);

        return redirect()->route('auth.login', $user)
        ->with([
            'success'=>'Tu cuenta ha sido creada'
        ]);
    }


    public function show(User $user)
    {
        $partidas=$user->partidas()->paginate(9);
        return view('pages.users.show')
            ->with([
                'user' => $user,
                'partidas' => $partidas,
            ]);
    }


    public function edit(User $user)
    {
        return view('pages.users.edit')
            ->with([
                'user' => $user
            ]);
    }


    public function update(Request $request, User $user)
    {
        $data = $request->all();
        unset($data['role']);
        $user->update($data);
        return redirect()->route('users.show', $user);
        //
    }


    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }
    public function cobrar(User $user)
    {
       $met=new Metodos();
       $monto=$user->saldo;
       $balance=$user->negocio->balance;
       $balance->saldo_actual=$balance->saldo_actual+$monto;
       $balance->save();
       $met->ajustarSaldoUsuario($user->id, $monto, 'resta');
       return view('pages.pdfs.recibo_cobrador')
       ->with([
           'user'=>$user,
           'admin'=>Auth::user(),
           'monto'=>$monto
       ]);
    }
}

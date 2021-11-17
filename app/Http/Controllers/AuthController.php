<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Models\User;
use App\Models\Plan;
use Illuminate\Http\Request; use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{

    public $user_id;
    
    /* Accede a vista de login */
    public function login()
    {
        if (Auth::user()) {
            return redirect()->intended('/home');;
        }
        return view('auth.login');
    }

    /* Accede a la vista de registro */
    public function register()
    {
        $plans = Plan::get();
        return view('auth.register')
            ->with([
                'plans' => $plans
            ]);
    }

    /* Accede a la vista de editar perfil */
    public function edit(User $user)
    {
        return view('auth.edit')
        ->with([
            'user'=>$user
        ]);
    }
    /* Validaciones */
    public function rules()
    {
        return [
            'phone'=>'required|max:12|regex:/8[0,2,4]9[0-9]{7}/',
            'email'=>'required|unique:users,email,'.$this->user_id.',id,deleted_at,NULL',
        ];
    }
    /* Actualiza los datos del usuario logueado */
    public function update(Request $request, User $user)
    {
        if ($request->password) {
            $password=bcrypt($request->password);
        } else{
            $password=$user->password;
        }
        $this->user_id=$user->id;
        $request->validate($this->rules());
        $data=$request->all();
        $data['password']=$password;
        $user->update($data);
        Auth::logout();
        Session::flash('success','Sus datos fueron actualizados');
        return redirect()->route('auth.login');
        
    }
    
    /* Cierra la sesión actual */
    public function logout()
    {
        Auth::logout();
        Session::flash('success','Has cerrado sesión');
        return redirect()->route('auth.login');
    }
    /* Inicia sesión */
    public function access(Request $request)
    {
        $request->merge([$request->user => strtolower($request->user)]);
        $credentials = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (Auth::user()->hasRole('admin|owner|employee')) {
                return redirect()->route('home');
            }
            return redirect()->route('invoices.pendings');
        }
        return back()->withErrors([
            'error' => 'Los datos suministrados no son válidos.',
        ]);
    }
    public function profile()
    {
        $user=Auth::user();
        return view('auth.profile')
        ->with([
            'user'=>$user
        ]);
    }
}

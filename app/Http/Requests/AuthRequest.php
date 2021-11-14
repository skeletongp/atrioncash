<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
class AuthRequest extends FormRequest
{
   
    public function authorize()
    {
        return true;
    }

    public function prepareForValidation()
    {
        $this->request->add(['fullname' => $this->name . ' ' . $this->lastname]);
        $this->request->add(['slug' => Str::slug($this->fullname, '-')]);
        $pos=strpos($this->email,'@');
        $username=substr($this->email, 0, $pos);
        $this->request->add(['username'=>$username]);
        if (!$this->id ) { //Si el usuario es nuevo
            $this->request->add(['password' => $username]);
            $this->request->add(['password_confirmation' => $username]);
        } else if(strlen($this->password<1)) { //Si se va a editar sin contraseña
            $user = User::find($this->id);
            $this->request->add(['password' => $user->password]);
            $this->request->add(['password_confirmation' => $user->password]);
        }
        $this->photo?'':$this->request->add(['photo'=>'https://ui-avatars.com/api/?name='.str_replace(' ','+',$this->fullname).'&color=FFFFFF&background=F400A0']);;
    }
    
    public function rules()
    {
        return [
            'fullname'=>'required|max:120',
            'name'=>'required|max:50',
            'phone'=>'required|max:12',
            'cedula'=>'required|max:13|unique:users,cedula|regex:/[0-9]{3}-[0-9]{7}-[0-9]{1}/',
            'email'=>'required|unique:users,email,'.$this->id.',id,deleted_at,NULL',
            'lastname'=>'required|max:50',
            'password'=>'required|confirmed|min:6',
        ];
    }
}

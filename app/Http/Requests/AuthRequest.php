<?php

namespace App\Http\Requests;

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
        if (!$this->password) {
            $this->request->add(['password'=>$username]);
            $this->request->add(['password_confirmation'=>$username]);
        }
        $this->photo?'':$this->request->add(['photo'=>'https://ui-avatars.com/api/?name='.str_replace(' ','+',$this->fullname).'&color=FFFFFF&background=F400A0']);;
    }
    
    public function rules()
    {
        return [
            'fullname'=>'required|max:120',
            'name'=>'required|max:50',
            'email'=>'required|unique:users,email,'.$this->id.',id,deleted_at,NULL',
            'lastname'=>'required|max:50',
            'password'=>'required|confirmed|min:6',
        ];
    }
}

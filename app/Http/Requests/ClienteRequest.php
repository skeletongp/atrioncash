<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ClienteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->hasRole('owner');
    }

   
    public function rules()
    {
        return [
            'name' => 'required|max:45',
            'lastname' => 'required|max:45',
            'cedula' => "required|max:13|regex:/[0-9]{3}-[0-9]{7}-[0-9]{1}/|unique:clientes,cedula," . $this->cliente_id,
            'phone' => [
                "required","max:10"."regex:/8[0,2,4]{1}9[0-9]{7}/",
                Rule::unique('clientes')
                                    ->ignore($this->cliente_id)
                                    ->where('negocio_id', Auth::user()->negocio_id)
            ],
            'email' => "required|email|unique:clientes,email," . $this->cliente_id,
        ];
    }
}

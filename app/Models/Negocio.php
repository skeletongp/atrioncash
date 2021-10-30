<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Negocio extends Model
{
    use HasFactory, SoftDeletes;

    public function usuarios()
    {
        return $this->hasMany(User::class);
    }
    public function empleados()
    {
        return $this->hasMany(User::class)->where('rolename','=','Empleado');
    }
    public function balance()
    {
        return $this->belongsTo(Balance::class);
    }
    public function clientes()
    {
        return $this->hasMany(Cliente::class);
    }
    public function cuotas()
    {
       return $this->hasMany(Cuota::class);
    }
}

<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Negocio extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded=[];
    public $incrementing = false; protected $keyType = 'string';

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

    public function deudas()
    {
        return $this->hasMany(Deuda::class);
    }

    public function notarios()
    {
        return $this->hasMany(Notario::class);
    }

    public function photo()
    {
        return 'https://ui-avatars.com/api/?name=' . urlencode($this->name) . '&color=ffffff&background=000000&rounded=true&bold=true';
    }
    public function getTrialAttribute()
    {
        $today=new DateTime(now());
        $date=$this->created_at;
        if ($today->diff($date)->days<15) {
            return true;
        }
        return false;
    }
    public function plan()
    {
        return $this->belongsToMany(Plan::class);
    }
    public function getStatusAttribute()
    {
       
        if ($this->plan()->where('status','=','activo')->count()) {
            return 'activo';
        }
        if ($this->plan()->where('status','=','pendiente')->count()) {
            return 'pendiente';
        }
        return "inactivo";
    }
}

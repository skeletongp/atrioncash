<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Nicolaslopezj\Searchable\SearchableTrait;

class Cliente extends Model
{
    use HasFactory, SoftDeletes, SearchableTrait;
    public $incrementing = false; protected $keyType = 'string';
    protected $searchable = [
       
        'columns' => [
            'clientes.name' => 10,
            'clientes.lastname' => 10,
            'clientes.email' => 2,
            'clientes.cedula' => 5,
            
        ]
    ];

    public function posts()
    {
        return $this->hasMany('Post');
    }
    protected $guarded = [];
    public function fullname()
    {
        return $this->name  . ' ' .  $this->lastname;
    }

    public function photo()
    {
        return 'https://ui-avatars.com/api/?name=' . urlencode($this->fullname()) . '&color=000000&background=EEEEEE&rounded=true&bold=true';
    }

    public function contratos()
    {
        return $this->hasMany(Contrato::class);
    }

    public function deudas()
    {
        return $this->hasMany(Deuda::class);
    }
    public function cuotas()
    {
        return $this->hasMany(Cuota::class);
    }
    public function getEstadoAttribute()
    {
      if ($this->cuotas()->where('status','pendiente')->where('fecha','<', date(now()))->count()) {
        return $this->status='atrasado';
      }
       return 'al día';
    }
   
}

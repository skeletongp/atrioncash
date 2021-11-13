<?php

namespace App\Models;

use Facade\FlareClient\Http\Client;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Nicolaslopezj\Searchable\SearchableTrait;

class Deuda extends Model
{
    use HasFactory, SoftDeletes, SearchableTrait;
   
    protected $searchable = [
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
        'columns' => [
            'clientes.name' => 10,
            'clientes.lastname' => 10,
            'clientes.email' => 2,
            'clientes.cedula' => 5,
            
        ],
        'joins'=>[
            'clientes' => ['deudas.cliente_id','clientes.id'],
        ],
    ];
    protected $guarded=[];
    protected $appends = [
        'status'
    ];

    public function cuotas()
    {
        return $this->hasMany(Cuota::class);
    }
     public function cliente()
     {
         return $this->belongsTo(Cliente::class);
     }

     public function negocio()
     {
         return $this->belongsTo(Negocio::class);
     }

     public function contrato()
     {
         return $this->hasOne(Contrato::class);
     }

     public function getProxpagoAttribute()
     {
         return $this->cuotas()->where('status','pendiente')->orderBy('id')->first();
     }
     
     public function getEstadoAttribute()
     {
       if ($this->cuotas()->where('status','pendiente')->where('fecha','<', date(now()))->count()) {
         return $this->status='atrasado';
       }
        return 'al día';
     }

     public function getTipoAttribute()
     {
         if ($this->type=='cuota') {
             return "A cuotas";
         }
         return "A rédito";
     }
}

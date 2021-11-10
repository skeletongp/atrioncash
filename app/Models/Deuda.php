<?php

namespace App\Models;

use Facade\FlareClient\Http\Client;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Deuda extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded=[];

    public function cuotas()
    {
        return $this->hasMany(Cuota::class);
    }
     public function cliente()
     {
         return $this->belongsTo(Cliente::class);
     }
     public function getProxpagoAttribute()
     {
         return $this->cuotas()->where('status','pendiente')->orderBy('id')->first();
     }
     
     public function getTipoAttribute()
     {
         if ($this->type=='cuota') {
             return "A cuotas";
         }
         return "A rédito";
     }
}

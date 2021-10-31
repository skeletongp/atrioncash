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

    public function Cuotas()
    {
        return $this->hasMany(Cuota::class);
    }
     public function cliente()
     {
         return $this->belongsTo(Cliente::class);
     }
   
}

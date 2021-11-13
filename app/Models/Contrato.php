<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function negocio()
    {
        return $this->belongsTo(Negocio::class);
    }
    
    public function deuda()
    {
        return $this->belongsTo(Deuda::class);
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function notario()
    {
        return $this->belongsTo(Notario::class);
    }
}

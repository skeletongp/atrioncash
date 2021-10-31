<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cuota extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded=[];

    public function negocio()
    {
        return $this->belongsTo(Negocio::class);
    }
    public function deuda()
    {
        return $this->belongsTo(Deuda::class);
    }
}

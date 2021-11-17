<?php

namespace App\Models;

use App\Traits\BalanceTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Partida extends Model
{
    use HasFactory, SoftDeletes, BalanceTrait;
    public $incrementing = false;
    protected $keyType = 'string';
    protected $guarded = [];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function negocio()
    {
        return $this->belongsTo(Negocio::class);
    }
}

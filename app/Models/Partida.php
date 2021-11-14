<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Partida extends Model
{
    use HasFactory, SoftDeletes;
    public $incrementing = false; protected $keyType = 'string';
    protected $guarded=[];
}

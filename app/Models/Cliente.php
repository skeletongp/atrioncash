<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];
    public function fullname()
    {
        return strtok($this->name, " ")  . ' ' .  strtok($this->lastname, " ");
    }

    public function photo()
    {
        return 'https://ui-avatars.com/api/?name=' . urlencode($this->fullname()) . '&color=000000&background=EEEEEE&rounded=true&bold=true';
    }

    public function deudas()
    {
        return $this->hasMany(Deuda::class);
    }
}

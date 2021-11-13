<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notario extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function municipio()
    {
        return $this->belongsTo(Municipio::class);
    }

    public function photo()
    {
        return 'https://ui-avatars.com/api/?name=' . urlencode($this->name) . '&color=000000&background=EEEEEE&rounded=true&bold=true';
    }
}

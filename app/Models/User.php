<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Nicolaslopezj\Searchable\SearchableTrait;



class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, SearchableTrait, SoftDeletes;
    public $incrementing = false; protected $keyType = 'string';
    
    protected $searchable = [
       
        'columns' => [
            'users.name' => 10,
            'users.lastname' => 10,
            'users.email' => 2,
            'users.cedula' => 5, 
        ]
    ];
    
    protected $fillable = [
        'name',
        'email',
        'password',
        'lastname',
        'rolename',
        'negocio_id',
        'phone',
        'username',
        'cedula',
        'id'
    ];

   
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function getFullnameAttribute()
    {
        return $this->name . ' ' . $this->lastname;
    }

    public function photo()
    {
        return 'https://ui-avatars.com/api/?name=' . urlencode($this->fullname) . '&color=000000&background=EEEEEE&rounded=true&bold=true';
    }
    public function negocio()
    {
        return $this->belongsTo(Negocio::class);
    }
    public function partidas()
    {
        return $this->hasMany(Partida::class);
    }
    public function cuotas()
    {
        return $this->hasMany(Cuota::class);
    }
   
}

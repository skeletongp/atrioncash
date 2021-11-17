<?php

use Illuminate\Support\Facades\Broadcast;



Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('cobros.{negocio_id}', function ($user, $negocio_id){
   
    if ($user->negocio_id===$negocio_id) {
        return $user->hasRole('owner');
    }
    return false;
});

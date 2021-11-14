<?php

namespace App\Broadcasting;

use App\Models\User;

class CobroChannel
{
   
    public function __construct()
    {
        //
    }

    
    public function join(User $user, $negocio_id)
    {
        return $user->negocio_id===$negocio_id;
    }
}

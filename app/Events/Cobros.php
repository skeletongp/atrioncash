<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class Cobros implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user, $cliente, $monto;
    public function __construct($user, $cliente, $monto)
    {
        $this->user = $user;
        $this->cliente = $cliente;
        $this->monto = $monto;
    }


    public function broadcastOn()
    {

        return new PrivateChannel('cobros.' . $this->user->negocio_id);
    }

    public function broadcastWith()
    {
        return [
            'store' => $this->user->negocio,
            'user' => $this->user,
            'cliente' => $this->cliente,
            'monto' => $this->monto,
        ];
    }
}

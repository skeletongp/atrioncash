<?php

namespace Database\Seeders;

use App\Models\Balance;
use App\Models\Negocio;
use App\Models\Plan;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Ramsey\Uuid\Uuid;
class DatabaseSeeder extends Seeder
{
    
    
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $admin=Role::create(['name'=>'admin']);
        $owner=Role::create(['name'=>'owner']);
        $employee=Role::create(['name'=>'employee']);
        $balance=Balance::create([
            'id'=>Uuid::uuid1(),
            'saldo_inicial'=>25000,
            'saldo_actual'=>25000,
            'capital_cobrado'=>0,
            'capital_prestado'=>0,
            'interes_cobrado'=>0,

        ]);
        
        $negocio=Negocio::create([
            'id'=>Uuid::uuid1(),
            'name'=>'Préstamos La Solución',
            'address'=>'Calle Los Frailes 22, SDO',
            'phone'=>'849-315-3337',
            'balance_id'=>$balance->id
        ]);
        $user=User::create([
            'id'=>Uuid::uuid1(),
            'name'=>'Ismael',
            'lastname'=>'Contreras',
            'email'=>'cash@atriontech.com',
            'phone'=>'8493153337',
            'cedula'=>'024-0184312-2',
            'username'=>'atrioncash',
            'password'=>bcrypt(env('OWNER_PASSWORD')),
            'rolename'=>'Administrador',
            'negocio_id'=>$negocio->id
        ]);

        $user->syncRoles(['admin', 'owner','employee']);
        
        Plan::create([
            'id'=>Uuid::uuid1(),
            'name'=>'Mensual',
            'price'=>1250,
            'periodo'=>'mensual',
        ]);
        
    }
}

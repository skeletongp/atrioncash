<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNegocioPlanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('negocio_plan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('negocio_id')->constrained();
            $table->foreignId('plan_id')->constrained();
            $table->enum('status',['activo','pendiente','inactivo']);
            $table->date('prox_pago');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('negocio_plan');
    }
}

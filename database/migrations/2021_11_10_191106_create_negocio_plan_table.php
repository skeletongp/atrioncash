<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Ramsey\Uuid\Uuid;
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
             $table->uuid('id')->primary();
            $table->foreignUuid('negocio_id')->constrained();
            $table->foreignUuid('plan_id')->constrained();
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

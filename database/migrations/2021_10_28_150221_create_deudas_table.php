<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeudasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deudas', function (Blueprint $table) {
            $table->id();
            $table->decimal('saldo_inicial');
            $table->decimal('saldo_actual');
            $table->decimal('interes');
            $table->enum('type',['cuota','redito'])->default('cuota');
            $table->enum('periodicidad',['diario','semanal','quincenal','mensual']);
            $table->integer('cuotas');
            $table->foreignId('cliente_id')->constrained();
            $table->foreignId('negocio_id')->constrained();
            $table->softDeletes();
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
        Schema::dropIfExists('deudas');
    }
}

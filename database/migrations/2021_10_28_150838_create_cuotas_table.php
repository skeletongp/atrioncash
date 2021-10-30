<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuotas', function (Blueprint $table) {
            $table->id();
            $table->decimal('saldo');
            $table->date('fecha');
            $table->enum('status',['pendiente','pagado']);
            $table->decimal('interes');
            $table->decimal('capital');
            $table->decimal('deber');
            $table->foreignId('deuda_id')->constrained();
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
        Schema::dropIfExists('cuotas');
    }
}

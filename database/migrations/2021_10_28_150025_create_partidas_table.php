<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Ramsey\Uuid\Uuid;
class CreatePartidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partidas', function (Blueprint $table) {
             $table->uuid('id')->primary();
            $table->decimal('entrada');
            $table->decimal('salida');
            $table->date('fecha');
            $table->string('detalle')->default('Cobro de cuota');
            $table->foreignUuid('cliente_id')->nullable()->constrained();
            $table->foreignUuid('user_id')->constrained();
            $table->foreignUuid('negocio_id')->constrained();
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
        Schema::dropIfExists('partidas');
    }
}

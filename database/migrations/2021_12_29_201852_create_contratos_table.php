<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Ramsey\Uuid\Uuid;
class CreateContratosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contratos', function (Blueprint $table) {
             $table->uuid('id')->primary();
            $table->text('parrafo')->nullable();
            $table->foreignUuid('user_id')->constrained();
            $table->foreignUuid('cliente_id')->constrained();
            $table->foreignUuid('deuda_id')->constrained();
            $table->foreignUuid('notario_id')->constrained();
            $table->foreignUuid('negocio_id')->constrained();
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
        Schema::dropIfExists('contratos');
    }
}

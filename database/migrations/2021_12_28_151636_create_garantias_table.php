<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Ramsey\Uuid\Uuid;
class CreateGarantiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('garantias', function (Blueprint $table) {
             $table->uuid('id')->primary();
            $table->string('name');
            $table->string('description');
            $table->string('photo');
            $table->enum('status',['recibido','devuelto']);
            $table->foreignUuid('cliente_id')->constrained();
            $table->foreignUuid('user_id')->constrained();
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
        Schema::dropIfExists('garantias');
    }
}

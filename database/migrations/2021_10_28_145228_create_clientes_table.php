<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Ramsey\Uuid\Uuid;
class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
             $table->uuid('id')->primary();
            $table->string('name');
            $table->string('lastname');
            $table->string('email');
            $table->string('phone');
            $table->decimal('deuda')->default(0);
            $table->string('cedula');
            $table->enum('status',['al día','atrasado']);
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
        Schema::dropIfExists('clientes');
    }
}

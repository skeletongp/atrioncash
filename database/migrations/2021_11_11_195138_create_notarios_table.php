<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Query\Expression;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateNotariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notarios', function (Blueprint $table) {
            $database = DB::connection("mysql2")->getDatabaseName();
            $table->id();
            $table->string('name');
            $table->string('cedula');
            $table->string('phone');
            $table->string('direccion',100);
            $table->integer('matricula');
            $table->foreignId('negocio_id')->constrained();
            $table->enum('titulo',['LIC.','DR.']);
            $table->bigInteger('municipio_id');
            $table->foreign('municipio_id')->references('id')->on(new Expression( $database. '.municipios'));
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
        Schema::dropIfExists('notarios');
    }
}

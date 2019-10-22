<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableFranquicias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('franquicias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombrefranquicia');
            $table->integer('idlocalidad');
            $table->string('direccion');
            $table->string('telefono');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('franquicias');
    }
}

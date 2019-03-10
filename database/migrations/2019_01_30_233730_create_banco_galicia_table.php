<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBancoGaliciaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banco_galicia', function (Blueprint $table) {
            $table->increments('id');
            $table->string('entidad');
            $table->string('compra');
            $table->string('venta');
            $table->string('dia');
            $table->string('hora');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('banco_galicia');
    }
}

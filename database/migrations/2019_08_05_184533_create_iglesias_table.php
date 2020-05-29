<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIglesiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('iglesias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 50);
            $table->text('domicilio');
            $table->text('telefono')->nullable();;
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('iglesias');
    }
}

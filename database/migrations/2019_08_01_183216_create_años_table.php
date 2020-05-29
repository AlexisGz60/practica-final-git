<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAñosTable extends Migration
{

     public function up(){
        Schema::create('años', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('year', false, 4)->unsigned();
            $table->timestamps();
        });
    }

    public function down(){
        Schema::dropIfExists('años');
    }
}

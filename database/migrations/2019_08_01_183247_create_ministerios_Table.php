<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMinisteriosTable extends Migration{

    public function up(){
        Schema::create('ministerios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 50);
            $table->text('descripcion');
            $table->integer('año_id')->unsigned();
            $table->foreign('año_id')->references('id')->on('años');
            $table->boolean('status')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ministerios');
    }
}

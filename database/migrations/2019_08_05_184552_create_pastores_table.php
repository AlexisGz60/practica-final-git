<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePastoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('pastores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 50);
            $table->text('tel')->nullable();;
            $table->integer('iglesia_id')->unsigned();
            $table->foreign('iglesia_id')->references('id')->on('iglesias')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pastores');
    }
}

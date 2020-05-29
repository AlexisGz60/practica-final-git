<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{

        public function up(){
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('usuario', 20)->unique();
            $table->string('password')->nullable();
            $table->boolean('activo')->default(false);
            $table->integer('perfil_id')->unsigned();
            $table->foreign('perfil_id')->references('id')->on('perfiles');
            $table->integer('ministerio_id')->unsigned();
            $table->foreign('ministerio_id')->references('id')->on('ministerios');
            $table->string('nombre');
            $table->string('acronimo',20)->nullable();
            $table->string('area', 128)->nullable();
            $table->string('cargo', 128)->nullable();
            $table->string('email', 50)->unique()->nullable();
            $table->string('tel',20)->nullable();
            $table->string('celular', 20)->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}

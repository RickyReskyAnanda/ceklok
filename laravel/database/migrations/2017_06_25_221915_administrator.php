<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Administrator extends Migration
{
    public function up()
    {
        Schema::create('table_admin', function (Blueprint $table) {
            $table->increments('id_admin');
            $table->string('nama');
            $table->string('no_telp');
            $table->string('password');
        });
    }

    public function down()
    {
        Schema::drop("table_admin");
    }
}

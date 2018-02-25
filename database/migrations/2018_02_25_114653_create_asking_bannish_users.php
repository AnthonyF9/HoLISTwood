<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAskingBannishUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('asking_bannish_user', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('id_user_reported');
          $table->char('name_user_reported', 150);
          $table->integer('id_mod');
          $table->char('name_mod', 150);
          $table->text('why');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asking_bannish_user');
    }
}

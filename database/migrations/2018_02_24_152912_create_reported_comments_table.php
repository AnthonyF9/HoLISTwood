<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportedCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('reported_comments', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('id_movie');
          $table->integer('id_comment');
          $table->integer('id_user_reported');
          $table->integer('id_user_reportman');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reported_comments');
    }
}

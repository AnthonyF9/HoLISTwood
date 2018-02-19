<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMyList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('mylist', function (Blueprint $table) {
        $table->increments('id');
        $table->text('user_id')->nullable(false);
        $table->text('movie_id')->nullable(false);
        $table->enum('status', ['completed', 'dropped', 'plan to watch'])->default('plan to watch');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mylist');
    }
}

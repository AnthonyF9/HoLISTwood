<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoviesSuggestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('movie_suggests', function (Blueprint $table) {
          $table->increments('id');
          $table->string('title', 100);
          $table->integer('year')->nullable(true);
          $table->char('runtime')->nullable(true);
          $table->char('director', 255)->nullable(true);
          $table->char('writers', 255)->nullable(true);
          $table->text('actors')->nullable(true);
          $table->text('plot')->nullable(true);
          $table->char('awards', 255)->nullable(true);
          $table->char('poster', 255)->nullable(true);
          $table->text('imdb_id')->nullable(true);
          $table->char('production', 255)->nullable(true);
          $table->char('website', 255)->nullable(true);
          $table->char('trailer', 255)->nullable(true);
          $table->enum('status', ['published','deleted','waiting moderation'])->default('waiting moderation');
          });

      }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('movie_suggests');
    }
}

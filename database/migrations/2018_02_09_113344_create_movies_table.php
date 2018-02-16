<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('movies', function (Blueprint $table) {
        $table->increments('id');
        $table->string('title', 100);
        $table->date('release_date')->nullable(true);
        $table->integer('year')->nullable(true);
        $table->char('runtime')->nullable(true);
        $table->char('director', 255)->nullable(true);
        $table->text('writers')->nullable(true);
        $table->text('actors')->nullable(true);
        $table->text('plot')->nullable(true);
        $table->char('awards', 255)->nullable(true);
        $table->char('poster', 255)->nullable(true);
        $table->text('imdb_id')->nullable(true);
        $table->char('production', 255)->nullable(true);
        $table->char('website', 255)->nullable(true);
        $table->char('genre', 255)->nullable(true);
        $table->enum('status', ['incoming', 'out'])->default('out');
        $table->enum('moderation', ['ok', 'softdelete'])->default('ok');
        $table->timestamps();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movies');
    }
}

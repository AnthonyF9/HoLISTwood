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
        $table->integer('year')->nullable(true);
        $table->mediumInteger('runtime')->nullable(true);
        $table->char('director', 255)->nullable(true);
        $table->char('writers', 255)->nullable(true);
        $table->text('actors')->nullable(true);
        $table->text('plot')->nullable(true);
        $table->char('awards', 255)->nullable(true);
        $table->char('poster', 255)->nullable(true);
        $table->text('imdb_id')->nullable(true);
        $table->char('production', 255)->nullable(true);
        $table->char('website', 255)->nullable(true);
        $table->char('triller', 255)->nullable(true);
        $table->enum('status', ['incoming', 'out'])->default('out');
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

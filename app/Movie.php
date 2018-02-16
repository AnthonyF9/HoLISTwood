<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $table = 'movies';

    protected $fillable = ['title', 'release_date','year', 'runtime', 'director', 'writers', 'actors', 'plot', 'awards', 'poster', 'imdb_id', 'production', 'website', 'genre', 'status','moderation'];

    public function release()
    {
    return $this->hasOne('\App\Release');
   }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $table = 'movies';

    protected $fillable = ['title','year', 'runtime', 'director', 'writers', 'actors', 'plot', 'awards', 'poster', 'imdb_id', 'production', 'website', 'genre', 'status'];

    // public function user()
    // {
    //   return $this->belongsTo('\App\User');
    // }
}

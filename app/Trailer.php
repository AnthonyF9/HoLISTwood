<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trailer extends Model
{
  protected $table = 'trailer';

  protected $fillable = ['id_movie', 'url_trailer'];

 //  public function getmovie()
 //  {
 //  return $this->belongsTo('\App\Movie');
 // }
}

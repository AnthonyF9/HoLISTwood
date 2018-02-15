<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Release extends Model
{

  protected $table = 'release';

  protected $fillable = ['release_date','imdb'];

  public function release()
  {
  return $this->belongsTo('\App\Movie');
 }
}

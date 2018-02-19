<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MyList extends Model
{
  protected $table = 'mylist';

  protected $fillable = ['user_id', 'movie_id', 'status'];
}

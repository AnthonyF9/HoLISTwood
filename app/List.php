<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class List extends Model
{
    protected $table = 'usersmovieslist';

    protected $fillable = ['user_id', 'movie_id', 'status'];
}

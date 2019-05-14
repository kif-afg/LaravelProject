<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    Protected $fillable =[
      'Rating',
        'MoviesId'
    ];
}

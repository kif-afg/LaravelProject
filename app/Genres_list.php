<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genres_list extends Model
{
    protected $table='genres_lists';
    protected $fillable =
        [

            'MoviesId',
            'GenreID'
        ];


}

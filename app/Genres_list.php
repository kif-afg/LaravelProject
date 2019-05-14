<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genres_list extends Model
{
    protected $fillable =
        [
            'GenreID',
            'MoviesId'
        ];

    public function Genres()
    {
        return $this->hasMany(Genre::class);
    }

}

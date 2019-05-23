<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $table='Genres';
    protected $primaryKey='GenreId';
    protected $fillable =
        [
            'Genre',
        ];
}

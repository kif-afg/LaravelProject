<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cast extends Model
{   protected $primaryKey = 'CastId';
    protected $table = 'casts';
    protected $fillable =
        [
            'ActorsId',
            'MoviesId'
        ];


    public $timestamps = false;
}

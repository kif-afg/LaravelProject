<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cast extends Model
{
    protected $fillable =
        [
            'ActorsId',
            'MoviesId'
        ];

    public function Actors()
    {
        return $this->hasMany(Actor::class);
    }
}

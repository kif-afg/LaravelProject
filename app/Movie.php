<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $table = 'movies';
    protected $primaryKey = 'MoviesId';
    protected $fillable = [
        'title',
        'poster',
        'Trailer',
        'Year'

    ];

    public function Rating()
    {
        return $this->hasMany(Rating::class);
    }

    public function Casts()
    {
        return $this->hasMany(Cast::class);
    }
    public function GetRatingAverage()
    {
        $count = $this->Ratings()->count();
        if (empty($count))
        {
            return 0;
        }
        $starRatingSum = $this->Ratings()->sum('Rating');
        $Average = $starRatingSum/$this->Ratings()->count();
        return average ;
    }

    public function genres_lists()
    {
        return $this->hasMany(Genres_list::class);
    }

}

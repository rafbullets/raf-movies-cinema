<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projection extends Model
{
    protected $guarded = ['id'];

    protected $with = ['cinemaHall'];

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }

    public function cinemaHall()
    {
        return $this->belongsTo(CinemaHall::class);
    }
}

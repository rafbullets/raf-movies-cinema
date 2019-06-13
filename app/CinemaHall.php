<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CinemaHall extends Model
{
    protected $guarded = ['id'];

    public function projections()
    {
        return $this->hasMany(Projection::class);
    }
}

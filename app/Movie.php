<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{

    protected $fillable = ['name', 'description', 'length', 'genre'];

    public function projections()
    {
        return $this->hasMany(Projection::class);
    }
}

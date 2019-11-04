<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $guarded = [];

    public function genres()
    {
        return $this->belongsToMany('App\Genre')->using('App\BookGenre');
    }
}

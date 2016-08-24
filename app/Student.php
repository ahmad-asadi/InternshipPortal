<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    protected $fillable = [
        'stdID', 'field',
    ];


    public function user()
    {
        return $this->morphOne('App\User', 'userable')
            ;
    }
}

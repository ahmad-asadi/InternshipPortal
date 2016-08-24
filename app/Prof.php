<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prof extends Model
{
    protected $fillable = [
        'edu', 'grade'
    ];

    protected $hidden = [
        'password',
    ] ;

    public function user()
    {
        return $this->morphOne('App\User', 'userable');
    }
}

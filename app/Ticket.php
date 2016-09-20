<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'description', 'capacity'
    ];

    public function company()
    {
        return $this->belongsTo('App/Company') ;
    }

    public function students()
    {
        return $this->hasMany('App/Student') ;
    }
}

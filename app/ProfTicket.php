<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfTicket extends Model
{
    protected $fillable = [
        'description', 'capacity'
    ];

    public function prof()
    {
        return $this->belongsTo('App\Prof')->first() ;
    }

    public function students()
    {
        return $this->hasMany('App\Student') ;
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'description', 'capacity', 'approved', 'deleted_at'
    ];

    public function company()
    {
        return $this->belongsTo('App\Company') ;
    }

    public function students()
    {
        return $this->hasMany('App\Student') ;
    }
}

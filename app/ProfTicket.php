<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProfTicket extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'description', 'capacity', 'approved', 'deleted_at'
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

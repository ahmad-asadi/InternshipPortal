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
        return $this->morphOne('App\User', 'userable');
    }

    public function ticket()
    {
        /** @noinspection PhpUndefinedMethodInspection */
        return $this->belongsTo('App\Ticket')->first();
    }

    public function profTicket()
    {
        /** @noinspection PhpUndefinedMethodInspection */
        return $this->belongsTo('App\ProfTicket')->first();
    }
}

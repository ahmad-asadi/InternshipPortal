<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{

    protected $fillable = [
        'company_name', 'business', 'description', 'address', 'link'
    ];

    protected $hidden = [
        'password',
    ] ;

    public function user()
    {
        return $this->morphOne('App\User', 'userable');
    }

    public function tickets()
    {
        return $this->hasMany('App\Ticket');
    }
}

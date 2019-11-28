<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Race extends Model
{
    protected $fillable = [
        'name', 'classification', 'lifetime'
    ];

    public function animal()
    {
        return $this->hasMany('App\Animal');
    }

}
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'sexe', 'age', 'pound', 'height', 'race_id'
    ];
      
    public function race()
    {
        return $this->belongsTo('App\Race');
    }
}

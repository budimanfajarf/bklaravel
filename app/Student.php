<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $guarded = [
        'id'
    ];

    public function records()
    {
        return $this->belongsToMany('App\Record');
    }      
}

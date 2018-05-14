<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    protected $guarded = [
        'id'
    ];    

    public function subservice()
    {
        return $this->belongsTo('App\Subservice');
    }

    public function students()
    {
        return $this->belongsToMany('App\Student');
    }    
}

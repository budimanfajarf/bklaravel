<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subservice extends Model
{
    protected $guarded = [
        'id'
    ];

    public function service()
    {
        return $this->belongsTo('App\Service');
    }
}

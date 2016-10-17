<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Creation extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function votes()
    {
        return $this->hasMany('App\Vote');
    }
}

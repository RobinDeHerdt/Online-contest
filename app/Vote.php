<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function creation()
    {
        return $this->belongsTo('App\Creation');
    }
}

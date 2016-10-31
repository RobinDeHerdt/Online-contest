<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Winner extends Model
{
    public function creation()
    {
        return $this->hasOne('App\Creation');
    }
}

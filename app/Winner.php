<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Winner extends Model
{
	use SoftDeletes;

    public function creation()
    {
        return $this->belongsTo('App\Creation');
    }
}

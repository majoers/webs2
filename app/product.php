<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    public function genre()
    {
        return $this->belongsTo('App\genre');
    }

    public function category()
    {
        return $this->belongsTo('App\category');
    }
}

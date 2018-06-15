<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    public function subcategory()
    {
        return $this->belongsTo('App\subcategory');
    }

    public function category()
    {
        return $this->belongsTo('App\category');
    }
}

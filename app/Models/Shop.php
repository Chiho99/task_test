<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    //
    protected $table = 'shops';
    public function area(){
        return $this->belongsTo('App\Models\Area');
    }

    public function routes(){
        return $this->belongsToMany('App\Models\Routes');
    }
}

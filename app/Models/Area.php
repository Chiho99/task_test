<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    //
    protected $table = "areas";

    public function shops(){
        return $this->hasMany('App\Models\Shop');

    }
}
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    //
    protected $fillable = [
        'name'
    ];

    public function generations(){

        return $this->hasMany('App\Generation');

    }
}

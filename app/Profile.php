<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //disables mass assignment
    protected $guarded =[];

    public function user(){
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //disables mass assignment
    protected $guarded =[];

    //displaying the image if set else display the default image
    public function profileImage(){
        $imagePath=($this->image) ? $this->image: '/profile/vnFdE8n9IJXhLnfoQBjNqboAXGrMSEUJ5xA8dZbx.png';
        return'/storage/' .$imagePath;
    }

    public function user(){ 
        return $this->belongsTo(User::class);
    }

    public function followers(){
        return $this->belongsToMany(User::class);
    }
}

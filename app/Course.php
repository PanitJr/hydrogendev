<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'courses';
    public function tags(){
        return $this->belongsToMany('App\Tag','tag_post');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\TagCourse;
use App\Http\Requests;

class TagController extends Controller
{
    public function findCourseByTag($tag)
    {
        $tagID = Tag::where('name','=',$tag)->first()->id;
        return TagCourse::where('tag_id','=',$tagID);


    }
}

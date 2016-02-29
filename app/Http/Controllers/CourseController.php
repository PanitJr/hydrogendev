<?php

namespace App\Http\Controllers;

use App\Tag;
use App\TagCourse;
use Illuminate\Http\Request;
use App\Course;
use App\Http\Requests;

class CourseController extends Controller
{

    public function create(Request $request)
    {
        // Validate
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'duration' => 'required',
            'price' => 'required',
            'description' => 'require',

            'thumbnail' => 'require',
        ]);
        if($validator->fails()){
            return $validator->errors();
        }
        //Create
        $course = new Course();
        $course->name = $request->get("name");
        $course->duration = $request->get("duration");
        $course->price = $request->get("price");
        $course->description = $request->get("description");
        $course->thumbnail = $request->get("thumbnail");
        $course->save();

//        foreach($request->get("tag") as $name) {
//            $tag = new Tag();
//            $tagCourse = new TagCourse();
//            $tag->name = $name;
//            $tag->save();
//            $tagCourse->tag_id = $tag->id;
//            $tagCourse->course_id = $course->id;
//        }
        return response()->json($course);
    }

    public function update(Request $request, $id)
    {
        // Validate
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'duration' => 'required',
            'price' => 'required',
            'description' => 'require',

            'thumbnail' => 'require',
        ]);
        if($validator->fails()){
            return $validator->errors();
        }
        //update
        $course = Course::find($id);
        $course->name = $request->get("name");
        $course->duration = $request->get("duration");
        $course->price = $request->get("price");
        $course->description = $request->get("description");
        $course->tag = $request->get("tag");
        $course->thumbnail = $request->get("thumbnail");
        $course->save();

//        foreach($request->get("tag") as $name) {
//            $tag = new Tag();
//            $tag->name = $name;
//            $tag->save();
//            $tagCourse = new TagCourse();
//            $tagCourse->tag_id = $tag->id;
//            $tagCourse->course_id = $course->id;
//        }

        return response()->json($course);
    }

    public function destroy($id)
    {
        Course::find($id)->delete();
        return back();
    }
//find course by id.
    public function findById($id)
    {
        return Course::find($id);
    }

//    public function findByTag($tag)
//    {
//        return Course::where('tag','=',$tag)->get();
//    }

    public function index()
    {
        return Course::all();
    }

}

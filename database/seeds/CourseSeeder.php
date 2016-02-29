<?php

use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $course = new \App\Course();
        $course->name = 'aaaaaa';
        $course->duration = '200';
        $course->price = 3000;
        $course->description = 'what the fucking guy';
        $course->tag = 'aaa';
        $course->thumbnail = 'asg wafawfawfasf';
        $course->save();
    }
}

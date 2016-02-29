<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagCourseTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tag_course', function(Blueprint $table){
            $table->increments('id');

            //FK attribute(s)
            $table->integer('tag_id')->unsigned();
            $table->integer('course_id')->unsigned();

            //FK connect
            $table->foreign('tag_id')->references('id')->on('tags');
            $table->foreign('course_id')->references('id')->on('courses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tag_course');
    }

}

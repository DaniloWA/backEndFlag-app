<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourseRequest;
use App\Models\Course;
use App\Traits\ApiResponser;

class ApiCourseController extends Controller
{
    use ApiResponser;

    public function __construct(Course $course){
        $this->course = $course;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = $this->course->all();

        return $this->success(['courses' => $courses],'All Courses Loaded!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\CourseRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseRequest $request)
    {
        $course = Course::create([
            'name' => $request->input('name'),
            'departament_id' => $request->input('departament_id'),
        ]);

        return $this->success(['course' => $course],'Course successfully created',201);
    }

    /**
     * Display the specified resource.
     *
     * @param  Integer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = $this->course->with('departament')->find($id);

        if($course === null){
           return $this->error('The searched resource does not exist',404);
        }

        return $this->success(['course' => $course],'Course successfully found!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\CourseRequest $request
     * @param  Integer $id
     * @return \Illuminate\Http\Response
     */
    public function update(CourseRequest $request, $id)
    {
        $course = $this->course->find($id);

        if($course === null){
            return $this->error('Unable to perform the update. The requested resource does not exist!',404);
        }

        $course->update($request->all());

        return $this->success(['course' => $course],'Course successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Integer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = $this->course->find($id);

        if($course === null){
            return $this->error('Unable to perform deletion. The requested resource does not exist!',404);
        }

        $course->delete();

        return $this->success(['course' => $course],'The course has been successfully removed!');
    }
}

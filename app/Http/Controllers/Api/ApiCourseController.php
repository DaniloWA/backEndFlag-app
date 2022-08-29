<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourseRequest;
use App\Models\Course;
use App\Repositories\Api\CourseRepository;
use Illuminate\Http\Request;

class ApiCourseController extends Controller
{
    public function __construct(Course $course){
        $this->course = $course;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $courseRepository = new CourseRepository($this->course);

        if($request->has('departament_filters')){
            $courseRepository->selectAttributesRelation('departament:id,'.$request->departament_filters);
        } else {
            $courseRepository->selectAttributesRelation('departament');
        }

        if($request->has('where_filters')){
            $courseRepository->where_filters($request->where_filters);
        }

        if( $request->has('course_filters')){
            $courseRepository->selectAttributes('departament_id,'.$request->course_filters);
        }

        return response()->json($courseRepository->getResult(), 200);
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

        return response()->json(['message' => 'Course created', 'data' => $course],201);
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
           return response()->json(['message' => 'The searched resource does not exist!'],404);
        }
        return response()->json($course,200);
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
            return response()->json(['message' => 'Unable to perform the update. The requested resource does not exist!'],404);
        }

        $course->update($request->all());

        return response()->json(['message' => 'Updated course', 'data' => $course],201);
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
            return response()->json('Unable to perform deletion. The requested resource does not exist!',404);
        }

        $course->delete();
        return response()->json(['message' => 'The course has been successfully removed!', 'data' => $course],200);
    }
}

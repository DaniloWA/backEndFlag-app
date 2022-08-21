<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class ApiCourseController extends Controller
{
    public function __construct(Course $course){
        $this->course = $course;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = $this->course->all();

        if($courses === null){
            return response()->json('Recurso pesquisado não existe!',404);
        }
        return response()->json($courses,200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate($this->course->rules(),$this->course->feedback());

        $course = $this->course->create($request->all());

        return response()->json($course,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  Integer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = $this->course->with('departament')->where('id',$id)->toSql();
        dd($course);

        if($course === null){
            return response()->json('Recurso pesquisado não existe!',404);
        }
        return response()->json($course,200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Integer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $course = $this->course->find($id);

        if($course === null){
            return response()->json('Impossivel realizar a atualização. O recurso solicitado não existe!',404);
        }

        if($request->method() === 'PATCH') {

            $dynamicRules = [];

            foreach($course->rules() as $input => $rule){
                if(array_key_exists($input, $request->all())) {
                    $dynamicRules[$input] = $rule;
                };
            };
            $request->validate( $dynamicRules,$course->feedback());
        } else {
            $request->validate($course->rules(),$course->feedback());
        }

        $course->update($request->all());

        return response()->json($course,200);
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
            return response()->json('Impossivel realizar a exclusão. O recurso solicitado não existe!',404);
        }

        $course->delete();
        return response()->json('A marca foi removida com sucesso!',200);
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Models\Student;
use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;
use App\Traits\ApiResponser;

class ApiStudentsController extends Controller
{
    use ApiResponser;

    public function __construct(Student $student){
        $this->student = $student;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = $this->student->all();

        return $this->success(['students' => $students],'All Students Loaded!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\StudentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {
        $student = Student::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'nif' => $request->input('nif'),
            'status' => $request->input('status'),
            'sex' => $request->input('sex'),
            'father_full_name' => $request->input('father_full_name'),
            'mother_full_name' => $request->input('mother_full_name'),
            'email' => $request->input('email'),
            'phone_num' => $request->input('phone_num'),
            'country' => $request->input('country'),
            'street_name' => $request->input('street_name'),
            'postal_code' => $request->input('postal_code'),
            'course_id' => $request->input('course_id'),
        ]);

        return $this->success(['student' => $student],'Student successfully created',201);
    }

    /**
     * Display the specified resource.
     *
     * @param  Integer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = $this->student->with('course')->find($id);
        if($student === null){
           return $this->error('The searched resource does not exist',404);
        }

        return $this->success(['student' => $student],'Student successfully found!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\StudentRequest  $request
     * @param  Integer $id
     * @return \Illuminate\Http\Response
     */
    public function update(StudentRequest $request, $id)
    {
        $student = $this->student->find($id);

        if($student === null){
            return $this->error('Unable to perform the update. The requested resource does not exist!',404);
        }

        $student->update($request->all());

        return $this->success(['student' => $student],'Student successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Integer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = $this->student->find($id);

        if($student === null){
            return $this->error('Unable to perform deletion. The requested resource does not exist!',404);
        }

        $student->delete();
        return $this->success(['student' => $student],'The student has been successfully removed!');
    }
}

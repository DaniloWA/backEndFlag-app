<?php

namespace App\Http\Controllers\Api;

use App\Models\Student;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;


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
    public function index(Request $request)
    {
        $students = $this->student;

        if($request->has('with_course') && $request->with_course == true){
            $students = $students
                ->join('courses', 'courses.id', '=', 'students.course_id')
                ->select(DB::raw('courses.uuid as course_uuid, courses.name as course_name'),
                        'students.*',
                        );
        };

        $studentsAll =  $students->get();

        return $this->success(['students' => $studentsAll],'All Students Loaded!');
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
     * @return \Illuminate\Http\Response
     */
    public function show($uuid)
    {
        $student = $this->student->with('course')->where('uuid', $uuid)->first();
        if($student === null){
           return $this->error('The searched resource does not exist',404);
        }

        return $this->success(['student' => $student],'Student successfully found!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\StudentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function update(StudentRequest $request, $uuid)
    {
        $student = $this->student->where('uuid', $uuid)->first();

        if($student === null){
            return $this->error('Unable to perform the update. The requested resource does not exist!',404);
        }

        $student->update($request->all());

        return $this->success(['student' => $student],'Student successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($uuid)
    {
        $student = $this->student->where('uuid', $uuid)->first();

        if($student === null){
            return $this->error('Unable to perform deletion. The requested resource does not exist!',404);
        }

        $student->delete();
        return $this->success(['student' => $student],'The student has been successfully removed!');
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Models\Student;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;
use App\Repositories\Api\StudentRepository as ApiStudentRepository;

class ApiStudentsController extends Controller
{
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
        $studentRepository = new ApiStudentRepository($this->student);

        if($request->has('course_filters')){
            $studentRepository->selectAttributesRelation('course:id,'.$request->course_filters);
        } else {
            $studentRepository->selectAttributesRelation('course');
        }

        if($request->has('where_filters')){
            $studentRepository->where_filters($request->where_filters);
        }

        if( $request->has('student_filters')){
            $studentRepository->selectAttributes('course_id,'.$request->student_filters);
        }

        return response()->json($studentRepository->getResult(), 200);
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

        return response()->json(['message' => 'Student created', 'data' => $student],201);
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
            return response()->json(['message' => 'The searched resource does not exist!'],404);
        }
        return response()->json($student,200);
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
            return response()->json(['message' => 'Unable to perform the update. The requested resource does not exist!'],404);
        }

        $student->update($request->all());

        return response()->json(['message' => 'Updated student', 'data' => $student],201);
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
            return response()->json('Unable to perform deletion. The requested resource does not exist!',404);
        }

        $student->delete();
        return response()->json(['message' => 'The student has been successfully removed!', 'data' => $student],200);
    }
}

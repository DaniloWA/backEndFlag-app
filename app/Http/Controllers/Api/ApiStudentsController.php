<?php

namespace App\Http\Controllers\Api;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        $request->validate($this->student->rules(),$this->student->feedback());

        $student = $this->student->create($request->all());

        return response()->json($student,201);
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
            return response()->json('Recurso pesquisado não existe!',404);
        }
        return response()->json($student,200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
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

        $student = $this->student->find($id);

        if($student === null){
            return response()->json('Impossivel realizar a atualização. O recurso solicitado não existe!',404);
        }

        if($request->method() === 'PATCH') {

            $dynamicRules = [];

            foreach($student->rules() as $input => $rule){
                if(array_key_exists($input, $request->all())) {
                    $dynamicRules[$input] = $rule;
                };
            };
            $request->validate( $dynamicRules,$student->feedback());
        } else {
            $request->validate($student->rules(),$student->feedback());
        }

        $student->update($request->all());

        return response()->json($student,200);
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
            return response()->json('Impossivel realizar a exclusão. O recurso solicitado não existe!',404);
        }

        $student->delete();
        return response()->json('A marca foi removida com sucesso!',200);
    }
}

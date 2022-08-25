<?php

namespace App\Http\Controllers\Api;

use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Api\TeacherRepository;

class ApiTeacherController extends Controller
{
    public function __construct(Teacher $teacher){
        $this->teacher = $teacher;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $teacherRepository = new TeacherRepository($this->teacher);

        if($request->has('departament_filters')){
            $teacherRepository->selectAttributesRelation('departament:id,'.$request->departament_filters);
        } else {
            $teacherRepository->selectAttributesRelation('departament');
        }

        if($request->has('where_filters')){
            $teacherRepository->where_filters($request->where_filters);
        }

        if( $request->has('teacher_filters')){
            $teacherRepository->selectAttributes('departament_id,'.$request->teacher_filters);
        }

        return response()->json($teacherRepository->getResult(), 200);
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
        $request->validate($this->teacher->rules(),$this->teacher->feedback());

        $teacher = $this->teacher->create($request->all());

        return response()->json($teacher,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  Integer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $teacher = $this->teacher->with('departament')->find($id);

        if($teacher === null){
            return response()->json('Recurso pesquisado não existe!',404);
        }
        return response()->json($teacher,200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(teacher $teacher)
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

        $teacher = $this->teacher->find($id);

        if($teacher === null){
            return response()->json('Impossivel realizar a atualização. O recurso solicitado não existe!',404);
        }

        if($request->method() === 'PATCH') {

            $dynamicRules = [];

            foreach($teacher->rules() as $input => $rule){
                if(array_key_exists($input, $request->all())) {
                    $dynamicRules[$input] = $rule;
                };
            };
            $request->validate( $dynamicRules,$teacher->feedback());
        } else {
            $request->validate($teacher->rules(),$teacher->feedback());
        }

        $teacher->update($request->all());

        return response()->json($teacher,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Integer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teacher = $this->teacher->find($id);

        if($teacher === null){
            return response()->json('Impossivel realizar a exclusão. O recurso solicitado não existe!',404);
        }

        $teacher->delete();
        return response()->json('A marca foi removida com sucesso!',200);
    }
}

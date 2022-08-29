<?php

namespace App\Http\Controllers\Api;

use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TeacherRequest;
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
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\TeacherRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeacherRequest $request)
    {
        $teacher = Teacher::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'status' => $request->input('status'),
            'departament_id' => $request->input('departament_id'),
        ]);

        return response()->json(['message' => 'Teacher created', 'data' => $teacher],201);
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
            return response()->json(['message' => 'The searched resource does not exist!'],404);
        }
        return response()->json($teacher,200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\TeacherRequest  $request
     * @param  Integer $id
     * @return \Illuminate\Http\Response
     */
    public function update(TeacherRequest $request, $id)
    {
        $teacher = $this->teacher->find($id);

        if($teacher === null){
           return response()->json(['message' => 'Unable to perform the update. The requested resource does not exist!'],404);
        }

        $teacher->update($request->all());

        return response()->json(['message' => 'Updated teacher', 'data' => $teacher],201);
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
            return response()->json('Unable to perform deletion. The requested resource does not exist!',404);
        }

        $teacher->delete();
        return response()->json(['message' => 'The teacher has been successfully removed!', 'data' => $teacher],200);
    }
}

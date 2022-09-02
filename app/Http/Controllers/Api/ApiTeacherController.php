<?php

namespace App\Http\Controllers\Api;

use App\Models\Teacher;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\TeacherRequest;

class ApiTeacherController extends Controller
{
    use ApiResponser;

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
        $teachers = $this->teacher;

        if($request->has('with_department') && $request->with_department == true){
            $teachers = $teachers
                ->join('departaments', 'departaments.id', '=', 'teachers.departament_id')
                ->select(DB::raw('departaments.uuid as department_uuid, departaments.name as department_name'),
                        'teachers.*',
                        );
        };

        $teachersAll =  $teachers->get();

        return $this->success(['teachers' => $teachersAll],'All Teachers Loaded!');
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

        return $this->success(['teacher' => $teacher],'Teacher successfully created',201);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($uuid)
    {
        $teacher = $this->teacher->with('departament')->where('uuid', $uuid)->first();

        if($teacher === null){
           return $this->error('The searched resource does not exist',404);
        }
        return $this->success(['teacher' => $teacher],'Teacher successfully found!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\TeacherRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function update(TeacherRequest $request, $uuid)
    {
        $teacher = $this->teacher->where('uuid', $uuid)->first();

        if($teacher === null){
            return $this->error('Unable to perform the update. The requested resource does not exist!',404);
        }

        $teacher->update($request->all());

        return $this->success(['teacher' => $teacher],'Teacher successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($uuid)
    {
        $teacher = $this->teacher->where('uuid', $uuid)->first();

        if($teacher === null){
            return $this->error('Unable to perform deletion. The requested resource does not exist!',404);
        }

        $teacher->delete();
        return $this->success(['teacher' => $teacher],'The teacher has been successfully removed!');
    }
}

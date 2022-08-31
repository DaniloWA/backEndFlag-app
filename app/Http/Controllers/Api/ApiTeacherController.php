<?php

namespace App\Http\Controllers\Api;

use App\Models\Teacher;
use App\Traits\ApiResponser;
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
    public function index()
    {
        $teachers = $this->teacher->all();

        return $this->success(['teachers' => $teachers],'All Teachers Loaded!');
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
     * @param  Integer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $teacher = $this->teacher->with('departament')->find($id);

        if($teacher === null){
           return $this->error('The searched resource does not exist',404);
        }
        return $this->success(['teacher' => $teacher],'Teacher successfully found!');
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
            return $this->error('Unable to perform the update. The requested resource does not exist!',404);
        }

        $teacher->update($request->all());

        return $this->success(['teacher' => $teacher],'Teacher successfully updated');
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
            return $this->error('Unable to perform deletion. The requested resource does not exist!',404);
        }

        $teacher->delete();
        return $this->success(['teacher' => $teacher],'The teacher has been successfully removed!');
    }
}

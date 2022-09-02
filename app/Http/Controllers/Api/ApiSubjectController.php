<?php

namespace App\Http\Controllers\Api;

use App\Models\Subject;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\SubjectRequest;

class ApiSubjectController extends Controller
{
    use ApiResponser;

     public function __construct(Subject $subject){
        $this->subject = $subject;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $subjects = $this->subject;

        if($request->has('with_department') && $request->with_department == true){
            $subjects = $subjects
                ->join('departaments', 'departaments.id', '=', 'subjects.departament_id')
                ->select(DB::raw('departaments.uuid as department_uuid, departaments.name as department_name'),
                        'subjects.*',
                        );
        };

        $subjectsAll =  $subjects->get();

        return $this->success(['subjects' => $subjectsAll],'All Subjects Loaded!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\SubjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubjectRequest $request)
    {
        $subject = Subject::create([
            'name' => $request->input('name'),
            'workload' => $request->input('workload'),
            'description' => $request->input('description'),
            'num_registered_students' => $request->input('num_registered_students'),
            'departament_id' => $request->input('departament_id'),
        ]);

        return $this->success(['subject' => $subject],'Subject successfully created',201);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($uuid)
    {
        $subject = $this->subject->with('departament')->where('uuid', $uuid)->first();

        if($subject === null){
           return $this->error('The searched resource does not exist',404);
        }

        return $this->success(['subject' => $subject],'Subject successfully found!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\SubjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function update(SubjectRequest $request, $uuid)
    {
        $subject = $this->subject->where('uuid', $uuid)->first();

        if($subject === null){
            return $this->error('Unable to perform the update. The requested resource does not exist!',404);
        }

        $subject->update($request->all());

        return $this->success(['subject' => $subject],'Subject successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($uuid)
    {
        $subject = $this->subject->where('uuid', $uuid)->first();

        if($subject === null){
            return $this->error('Unable to perform deletion. The requested resource does not exist!',404);
        }

        $subject->delete();
        return $this->success(['subject' => $subject],'The subject has been successfully removed!');
    }
}

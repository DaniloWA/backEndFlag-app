<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubjectRequest;
use App\Models\Subject;
use App\Traits\ApiResponser;

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

    public function index()
    {
        $subjects = $this->subject->all();

        return $this->success(['subjects' => $subjects],'All Subjects Loaded!');
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
     * @param  Integer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subject = $this->subject->with('departament')->find($id);

        if($subject === null){
           return $this->error('The searched resource does not exist',404);
        }

        return $this->success(['subject' => $subject],'Subject successfully found!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\SubjectRequest  $request
     * @param  Integer $id
     * @return \Illuminate\Http\Response
     */
    public function update(SubjectRequest $request, $id)
    {
        $subject = $this->subject->find($id);

        if($subject === null){
            return $this->error('Unable to perform the update. The requested resource does not exist!',404);
        }

        $subject->update($request->all());

        return $this->success(['subject' => $subject],'Subject successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Integer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subject = $this->subject->find($id);

        if($subject === null){
            return $this->error('Unable to perform deletion. The requested resource does not exist!',404);
        }

        $subject->delete();
        return $this->success(['subject' => $subject],'The subject has been successfully removed!');
    }
}

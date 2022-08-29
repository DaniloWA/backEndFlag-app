<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubjectRequest;
use App\Models\Subject;
use App\Repositories\Api\SubjectRepository;
use Illuminate\Http\Request;

class ApiSubjectController extends Controller
{
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
        $subjectRepository = new SubjectRepository($this->subject);

        if($request->has('departament_filters')){
            $subjectRepository->selectAttributesRelation('departament:id,'.$request->departament_filters);
        } else {
            $subjectRepository->selectAttributesRelation('courses');
        }

        if($request->has('where_filters')){
            $subjectRepository->where_filters($request->where_filters);
        }

        if( $request->has('subject_filters')){
            $subjectRepository->selectAttributes('departament_id,'.$request->subject_filters);
        }

        return response()->json($subjectRepository->getResult(), 200);
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

        return response()->json(['message' => 'Subject created', 'data' => $subject],201);
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
            return response()->json(['message' => 'The searched resource does not exist!'],404);
        }

        return response()->json($subject,200);
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
            return response()->json(['message' => 'Unable to perform the update. The requested resource does not exist!'],404);
        }

        $subject->update($request->all());

        return response()->json(['message' => 'Updated subject', 'data' => $subject],201);
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
            return response()->json('Unable to perform deletion. The requested resource does not exist!',404);
        }

        $subject->delete();
        return response()->json(['message' => 'The subject has been successfully removed!', 'data' => $subject],200);
    }
}

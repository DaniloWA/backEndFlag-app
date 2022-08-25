<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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
        $request->validate($this->subject->rules(),$this->subject->feedback());

        $subject = $this->subject->create($request->all());

        return response()->json($subject,201);
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
            return response()->json('Recurso pesquisado não existe!',404);
        }

        return response()->json($subject,200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(subject $subject)
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

        $subject = $this->subject->find($id);

        if($subject === null){
            return response()->json('Impossivel realizar a atualização. O recurso solicitado não existe!',404);
        }

        if($request->method() === 'PATCH') {

            $dynamicRules = [];

            foreach($subject->rules() as $input => $rule){
                if(array_key_exists($input, $request->all())) {
                    $dynamicRules[$input] = $rule;
                };
            };
            $request->validate( $dynamicRules,$subject->feedback());
        } else {
            $request->validate($subject->rules(),$subject->feedback());
        }

        $subject->update($request->all());

        return response()->json($subject,200);
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
            return response()->json('Impossivel realizar a exclusão. O recurso solicitado não existe!',404);
        }

        $subject->delete();
        return response()->json('O subjecto foi removido com sucesso!',200);
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Departament;
use App\Repositories\Api\DepartamentRepository;
use Illuminate\Http\Request;

class ApiDepartamentController extends Controller
{
    public function __construct(Departament $departament){
        $this->departament = $departament;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $departamentRepository = new DepartamentRepository($this->departament);

        if($request->has('course_filters')){
            $departamentRepository->selectAttributesRelation('course:id,'.$request->course_filters);
        } else {
            $departamentRepository->selectAttributesRelation('course');
        }

        if($request->has('where_filters')){
            $departamentRepository->where_filters($request->where_filters);
        }

        if( $request->has('departament_filters')){
            $departamentRepository->selectAttributes($request->departament_filters);
        }

        return response()->json($departamentRepository->getResult(), 200);
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
        $request->validate($this->departament->rules(),$this->departament->feedback());

        $departament = $this->departament->create($request->all());

        return response()->json($departament,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  Integer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $departament = $this->departament->with('course')->find($id);

        if($departament === null){
            return response()->json('Recurso pesquisado não existe!',404);
        }

        return response()->json($departament,200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Departament  $departament
     * @return \Illuminate\Http\Response
     */
    public function edit(Departament $departament)
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

        $departament = $this->departament->find($id);

        if($departament === null){
            return response()->json('Impossivel realizar a atualização. O recurso solicitado não existe!',404);
        }

        if($request->method() === 'PATCH') {

            $dynamicRules = [];

            foreach($departament->rules() as $input => $rule){
                if(array_key_exists($input, $request->all())) {
                    $dynamicRules[$input] = $rule;
                };
            };
            $request->validate( $dynamicRules,$departament->feedback());
        } else {
            $request->validate($departament->rules(),$departament->feedback());
        }

        $departament->update($request->all());

        return response()->json($departament,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Integer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $departament = $this->departament->find($id);

        if($departament === null){
            return response()->json('Impossivel realizar a exclusão. O recurso solicitado não existe!',404);
        }

        $departament->delete();
        return response()->json('O departamento foi removido com sucesso!',200);
    }
}

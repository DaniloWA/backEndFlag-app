<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\DepartamentRequest;
use App\Models\Departament;
use App\Traits\ApiResponser;

class ApiDepartamentController extends Controller
{
    use ApiResponser;

    public function __construct(Departament $departament){
        $this->departament = $departament;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $departments = $this->departament->all();

        return $this->success(['departments' => $departments],'All Departments Loaded!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\DepartamentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepartamentRequest $request)
    {
        $departament = Departament::create([
            'name' => $request->input('name')
        ]);

        return $this->success(['department' => $departament],'Department successfully created',201);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($uuid)
    {

        $departament = $this->departament->where('uuid', $uuid)->first();

        if($departament === null){
           return $this->error('The searched resource does not exist',404);
        }

        return $this->success(['department' => $departament],'Department successfully found!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\DepartamentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function update(DepartamentRequest $request, $uuid)
    {
        $departament = $this->departament->where('uuid', $uuid)->first();

        if($departament === null){
            return $this->error('Unable to perform the update. The requested resource does not exist!',404);
        }

        $departament->update($request->all());

        return $this->success(['department' => $departament],'Department successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Integer
     * @return \Illuminate\Http\Response
     */
    public function destroy($uuid)
    {
        $departament = $this->departament->where('uuid', $uuid)->first();

        if($departament === null){
            return $this->error('Unable to perform deletion. The requested resource does not exist!',404);
        }

        $departament->delete();

        return $this->success(['department' => $departament],'The department has been successfully removed!');
    }
}

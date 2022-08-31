<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class StudentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $response = $request->response;
        $collapse =  $request->collapse;

        $courses = [];
        $students = [];

        if (!Cache::has('course.list')){
            $token = hasUserToken($request);

            Cache::remember('course.list', 60, function () use ($token) {
                $response = Http::withToken($token)->get("http://backEndFlag-app.test/api/courses");
                if($response->json() != null){
                    return $response->json()['data']['courses'];
                }
                return [];
            });
        }

        if (!Cache::has('student.list')){
            $token = hasUserToken($request);

            Cache::remember('student.list', 60, function () use ($token)  {
                $response = Http::withToken($token)->get("http://backEndFlag-app.test/api/students");
                if($response->json() != null){
                    return $response->json()['data']['students'];
                }
                return [];
            });
        }
        $courses = Cache::get('course.list');
        $students = Cache::get('student.list');

        return view('app.students',['courses' => $courses, 'students' =>  $students,'response' => $response,'collapse' => $collapse]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $collapse = '';
        $token  = 'Bearer '.session('api_token');
        $response = Http::withHeaders([
                    'Accept' => 'application/json',
                    'Authorization' => $token,
                ])->post('http://backEndFlag-app.test/api/students',[
                    'first_name' => $request->input('first_name'),
                    'last_name' => $request->input('last_name'),
                    'nif' => $request->input('nif'),
                    'status' => $request->input('status'),
                    'sex' => $request->input('sex'),
                    'father_full_name' => $request->input('father_full_name'),
                    'mother_full_name' => $request->input('mother_full_name'),
                    'email' => $request->input('email'),
                    'phone_num' => $request->input('phone_num'),
                    'country' => $request->input('country'),
                    'street_name' => $request->input('street_name'),
                    'postal_code' => $request->input('postal_code'),
                    'course_id' => $request->input('course_id'),
                    'first_name' => $request->input('first_name'),
        ]);

        if($response->failed()){

            $errors = ['error' => 'Unidentified error'];
            $collapse = 'newStudent';

            if(isset($response->json()['errors'])){
                   $errors = $response->json()['errors'];
            }

            return redirect()->route('app.student.index',['collapse' => $collapse])
                        ->withErrors( $errors)
                        ->withInput();
        }
        return redirect()->route('app.student.index',['response' => $response->json(),'collapse' => $collapse]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }
}

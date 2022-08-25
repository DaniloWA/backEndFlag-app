<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiCourseController;
use App\Http\Controllers\Api\ApiDepartamentController;
use App\Http\Controllers\Api\ApiTeacherController;
use App\Http\Controllers\Api\ApiStudentsController;
use App\Http\Controllers\Api\ApiSubjectController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::apiResource('/students',ApiStudentsController::class);
Route::apiResource('/teachers', ApiTeacherController::class);
Route::apiResource('/courses', ApiCourseController::class);
Route::apiResource('/subjects', ApiSubjectController::class);
Route::apiResource('/departments', ApiDepartamentController::class);





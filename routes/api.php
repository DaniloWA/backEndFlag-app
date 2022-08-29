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

// Endpoint student
Route::get('/students ', [ApiStudentsController::class, 'index'])->name('api.student.index');
Route::post('/students ', [ApiStudentsController::class, 'store'])->name('api.student.store');
Route::get('/students/{student} ', [ApiStudentsController::class, 'show'])->name('api.student.show');
Route::put('/students/{student} ', [ApiStudentsController::class, 'update'])->name('api.student.update');
Route::delete('/students/{student} ', [ApiStudentsController::class, 'destroy'])->name('api.student.delete');

// Endpoint teacher
Route::get('/teachers ', [ApiTeacherController::class, 'index'])->name('api.teacher.index');
Route::post('/teachers ', [ApiTeacherController::class, 'store'])->name('api.teacher.store');
Route::get('/teachers/{teacher} ', [ApiTeacherController::class, 'show'])->name('api.teacher.show');
Route::put('/teachers/{teacher} ', [ApiTeacherController::class, 'update'])->name('api.teacher.update');
Route::delete('/teachers/{teacher} ', [ApiTeacherController::class, 'destroy'])->name('api.teacher.delete');

// Endpoint Course
Route::get('/courses ', [ApiCourseController::class, 'index'])->name('api.course.index');
Route::post('/courses ', [ApiCourseController::class, 'store'])->name('api.course.store');
Route::get('/courses/{course} ', [ApiCourseController::class, 'show'])->name('api.course.show');
Route::put('/courses/{course} ', [ApiCourseController::class, 'update'])->name('api.course.update');
Route::delete('/courses/{course} ', [ApiCourseController::class, 'destroy'])->name('api.course.delete');

// Endpoint Department
Route::get('/departments ', [ApiDepartamentController::class, 'index'])->name('api.department.index');
Route::post('/departments ', [ApiDepartamentController::class, 'store'])->name('api.department.store');
Route::get('/departments/{departments} ', [ApiDepartamentController::class, 'show'])->name('api.department.show');
Route::put('/departments/{departments} ', [ApiDepartamentController::class, 'update'])->name('api.department.update');
Route::delete('/departments/{departments} ', [ApiDepartamentController::class, 'destroy'])->name('api.department.delete');

// Endpoint subject
Route::get('/subjects ', [ApiSubjectController::class, 'index'])->name('api.subject.index');
Route::post('/subjects ', [ApiSubjectController::class, 'store'])->name('api.subject.store');
Route::get('/subjects/{subject} ', [ApiSubjectController::class, 'show'])->name('api.subject.show');
Route::put('/subjects/{subject} ', [ApiSubjectController::class, 'update'])->name('api.subject.update');
Route::delete('/subjects/{subject} ', [ApiSubjectController::class, 'destroy'])->name('api.subject.delete');





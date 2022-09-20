<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/',function(){ return redirect()->route('app.home');});

Route::prefix('app')->group(function () {
    // Endpoint Home
    Route::get('/home', [HomeController::class, 'index'])->name('app.home');

    // Endpoint student
    Route::get('/students', [StudentController::class, 'index'])->name('app.student.index');
    Route::post('/students', [StudentController::class, 'store'])->name('app.student.store');
    Route::get('/students/{student} ', [StudentController::class, 'show'])->name('app.student.show');
    Route::put('/students/{student} ', [StudentController::class, 'update'])->name('app.student.update');
    Route::delete('/students/{student} ', [StudentController::class, 'destroy'])->name('app.student.delete');

    // Endpoint teacher
    Route::get('/teachers', [TeacherController::class, 'index'])->name('app.teacher.index');
    Route::post('/teachers', [TeacherController::class, 'store'])->name('app.teacher.store');
    Route::get('/teachers/{teacher} ', [TeacherController::class, 'show'])->name('app.teacher.show');
    Route::put('/teachers/{teacher} ', [TeacherController::class, 'update'])->name('app.teacher.update');
    Route::delete('/teachers/{teacher} ', [TeacherController::class, 'destroy'])->name('app.teacher.delete');

    // Endpoint Course
    Route::get('/courses', [CourseController::class, 'index'])->name('app.course.index');
    Route::post('/courses', [CourseController::class, 'store'])->name('app.course.store');
    Route::get('/courses/{course} ', [CourseController::class, 'show'])->name('app.course.show');
    Route::put('/courses/{course} ', [CourseController::class, 'update'])->name('app.course.update');
    Route::delete('/courses/{course} ', [CourseController::class, 'destroy'])->name('app.course.delete');
});








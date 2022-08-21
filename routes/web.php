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

Route::fallback(function(){
    return redirect()->route('app.home');
});


Route::prefix('app')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('app.home');
    Route::resource('/students', StudentController::class)->name('index','app.students');
    Route::resource('/teachers', TeacherController::class)->name('index','app.teachers');
    Route::resource('/courses', CourseController::class)->name('index','app.courses');
});








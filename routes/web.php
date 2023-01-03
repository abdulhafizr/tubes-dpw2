<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return view('admin.dashboard');
//});

Route::redirect('/', '/dashboard');

Route::prefix("/dashboard")->group(function () {

    // GET METHOD
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::get('/class', function () {
        return view('admin.ruangan');
    })->name('class');
    Route::get('/inventory', function () {
        return view('admin.inventori');
    })->name('inventory');
    Route::get('/student', function () {
        return view('admin.siswa');
    })->name('student');


    // Course
    Route::resource('/course', CourseController::class);

    // Teacher
    Route::get('/teacher/photo', [TeacherController::class, 'photo'])->name('teacher.photo');
    Route::resource('/teacher', TeacherController::class);
});


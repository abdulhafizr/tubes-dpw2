<?php

use App\Http\Controllers\CourseController;
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
//
//
//    Route::controller(CourseController::class)->group(function () {
//        Route::get('/course', 'index')->name('course.index');
//        Route::get('/course/add', 'create')->name('course.create');
//        Route::get('/course/{course}', 'edit');
//        Route::put('/course/{course}', 'update');
//        Route::post('/course/add', 'store')->name('course.store');
//    });
    Route::get('/class', function () {
        return view('admin.ruangan');
    })->name('class');
    Route::get('/inventory', function () {
        return view('admin.inventori');
    })->name('inventory');
    Route::get('/teacher', function () {
        return view('admin.guru');
    })->name('teacher');
    Route::get('/student', function () {
        return view('admin.siswa');
    })->name('student');

    // POST
    Route::resource('/course', CourseController::class);
});


<?php

use App\Http\Controllers\ClassRoomController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
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

Route::redirect('/', '/dashboard');

Route::get('/login', [AuthController::class, 'index'])
    ->name('login')
    ->middleware('guest');

Route::post('/login', [AuthController::class, 'login'])
    ->name('auth.login')
    ->middleware('guest');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('auth.logout');

Route::prefix("/dashboard")->middleware('auth')->group(function () {

    // GET METHOD
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Course
    Route::resource('/course', CourseController::class);

    // ClassRoom
    Route::resource('/class-room', ClassRoomController::class);

    // Inventories
    Route::resource('/inventory', InventoryController::class);

    // Student
    Route::get('/student/photo', [StudentController::class, 'photo'])->name('student.photo');
    Route::resource('/student', StudentController::class);

    // Teacher
    Route::get('/teacher/photo', [TeacherController::class, 'photo'])->name('teacher.photo');
    Route::get('/teacher/{teacher:id}/course', [TeacherController::class, 'courses'])->name('teacher.course');
    Route::get('/teacher/{teacher:id}/student', [TeacherController::class, 'students'])->name('teacher.student');
    Route::resource('/teacher', TeacherController::class);
});


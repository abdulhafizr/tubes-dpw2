<?php

namespace App\Http\Controllers;

use App\Models\ClassRoom;
use App\Models\Course;
use App\Models\Inventory;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $courses = Course::query()->count();
        $class_rooms = ClassRoom::query()->count();
        $inventories = Inventory::query()->count();
        $students = Student::query()->count();
        $teachers = Teacher::query()->count();

        return view('admin.dashboard', compact(
            'courses',
            'class_rooms',
            'inventories',
            'students',
            'teachers'
        ));
    }
}

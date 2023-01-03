<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Teacher;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;


class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|Application|View
     */
    public function index(): View|Factory|Application
    {
        $courses = Course::paginate(10);
        return view('admin.courses.index')->with('courses', $courses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view("admin.courses.create", [
            "course" => new Course(),
            "teachers" => Teacher::query()->orderBy('name', 'asc')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(Request $request): Redirector|RedirectResponse|Application
    {
        $this->validate_form($request);
        $course = new Course();
        $insert_result = $this->insert_model($course, $request);
        if ($insert_result) {
            $type = 'success';
            $title = 'Pelajaran berhasil ditambah!';
            toast($title, $type);
            return redirect(route('course.index'));
        } else {
            $type = 'error';
            $title = 'Pelajaran gagal ditambah!';
            toast($title, $type);
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View|Response
     */
    public function edit(Course $course): View|Factory|Response|Application
    {
        return view('admin.courses.edit', [
            'title' => 'EDIT',
            'course' => $course,
            "teachers" => Teacher::query()->orderBy('name', 'asc')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Application|Redirector|RedirectResponse
     */
    public function update(Request $request, Course $course): Redirector|RedirectResponse|Application
    {
        $this->validate_form($request);
        $update_result = $this->insert_model($course, $request);
        if ($update_result) {
            $type = 'success';
            $title = 'Pelajaran berhasil diupdate!';
            toast($title, $type);
            return redirect(route('course.index'));
        } else {
            $type = 'error';
            $title = 'Pelajaran gagal diupdate!';
            toast($title, $type);
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Course $course
     * @return RedirectResponse
     */
    public function destroy(Course $course): RedirectResponse
    {
        $course = $course->delete();
        if ($course) {
            $type = 'success';
            $title = 'Pelajaran berhasil dihapus!';
        } else {
            $type = 'error';
            $title = 'Pelajaran gagal dihapus!';
        }
        toast($title, $type);
        return back();
    }

    /**
     * @param Request $request
     * @return array
     */
    public function validate_form(Request $request): array
    {
        return $request->validate([
            'teacher_id' => 'required',
            'name' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'class_name' => 'required',
        ]);
    }

    /**
     * @param Course $course
     * @param Request $request
     * @return bool
     */
    public function insert_model(Course $course, Request $request): bool
    {
        $course->setAttribute('teacher_id', $request->get('teacher_id'));
        $course->setAttribute('name', $request->get('name'));
        $course->setAttribute('start_time', $request->get('start_time'));
        $course->setAttribute('end_time', $request->get('end_time'));
        $course->setAttribute('class_name', $request->get('class_name'));
        return $course->save();
    }
}

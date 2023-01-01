<?php

namespace App\Http\Controllers;

use App\Models\Course;
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
            'title' => 'INPUT',
            "course" => new Course()
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
        $this->insert_model($course, $request);
        toast('Pelajaran berhasil ditambah!', 'success');
        return redirect(route('course.index'));
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
            'course' => $course
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Application|Redirector|RedirectResponse
     */
    public function update(Request $request, $id): Redirector|RedirectResponse|Application
    {
        $this->validate_form($request);
        $course = Course::find($id);
        $this->insert_model($course, $request);
        toast('Pelajaran berhasil diedit!', 'success');
        return redirect(route('course.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $course = Course::find($id)->delete();
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
            'nama_pelajaran' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'nama_kelas' => 'required',
            'nama_guru' => 'required'
        ]);
    }

    /**
     * @param $course
     * @param Request $request
     * @return void
     */
    public function insert_model($course, Request $request): void
    {
        $course->setAttribute('name', $request->get('nama_pelajaran'));
        $course->setAttribute('start_time', $request->get('jam_mulai'));
        $course->setAttribute('end_time', $request->get('jam_selesai'));
        $course->setAttribute('name', $request->get('nama_pelajaran'));
        $course->setAttribute('class_name', $request->get('nama_kelas'));
        $course->setAttribute('teacher_name', $request->get('nama_guru'));
        $course->save();
    }
}

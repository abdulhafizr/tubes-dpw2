<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|Application|View
     */
    public function index()
    {
        $courses = Course::all();
        return view('admin.courses.index')->with('courses', $courses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $courses = Course::all();
        return view("admin.courses.create", ["courses" => $courses]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(Request $request): Redirector|RedirectResponse|Application
    {
        $request->validate([
            'nama_pelajaran' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'nama_kelas' => 'required',
            'nama_guru' => 'required'
        ]);

        $course = new Course();
        $course->setAttribute('name', $request->get('nama_pelajaran'));
        $course->setAttribute('start_time', $request->get('jam_mulai'));
        $course->setAttribute('end_time', $request->get('jam_selesai'));
        $course->setAttribute('name', $request->get('nama_pelajaran'));
        $course->setAttribute('class_name', $request->get('nama_kelas'));
        $course->setAttribute('teacher_name', $request->get('nama_guru'));
        $course->save();
        return redirect('/dashboard/courses');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

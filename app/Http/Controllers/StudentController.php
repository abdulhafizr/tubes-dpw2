<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{

    private array $genders = [
        'L' => 'Laki-Laki',
        'P' => 'Perempuan'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index(): View|Factory|Response|Application
    {
        $students = Student::query()->paginate(10);
        return view('admin.students.index', [
            'students' => $students
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create(): View|Factory|Response|Application
    {
        $teachers = Teacher::query()->orderBy('id')->get();
        return view('admin.students.create', [
            'student' => new Teacher(),
            'teachers' => $teachers,
            'genders' => $this->genders
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|Redirector|RedirectResponse
     */
    public function store(Request $request): Redirector|RedirectResponse|Application
    {
        $this->validate_form($request);
        $student = new Student();
        $result = $this->insert_model($student, $request);
        if ($result) {
            $type = 'success';
            $title = 'Siswa berhasil ditambah!';
            toast($title, $type);
            return redirect(route('student.index'));
        } else {
            $type = 'error';
            $title = 'Siswa gagal ditambah!';
            toast($title, $type);
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Student $student
     * @return Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Student $student
     * @return Application|Factory|View|Response
     */
    public function edit(Student $student): View|Factory|Response|Application
    {
        $teachers = Teacher::query()->orderBy('id')->get();
        return view('admin.students.edit', [
            'student' => $student,
            'teachers' => $teachers,
            'genders' => $this->genders
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Student $student
     * @return Application|Redirector|RedirectResponse
     */
    public function update(Request $request, Student $student): Redirector|RedirectResponse|Application
    {
        $this->validate_form($request);
        $result = $this->insert_model($student, $request, true);
        if ($result) {
            $type = 'success';
            $title = 'Siswa berhasil diupdate!';
            toast($title, $type);
            return redirect(route('student.index'));
        } else {
            $type = 'error';
            $title = 'Siswa gagal diupdate!';
            toast($title, $type);
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Student $student
     * @return RedirectResponse|Response
     */
    public function destroy(Student $student): Response|RedirectResponse
    {
        $result = $student->delete();
        $clear_path = array_slice(explode('/', $student->photo), 1);
        Storage::delete(join('/', $clear_path));
        if ($result) {
            $type = 'success';
            $title = 'Siswa berhasil dihapus!';
        } else {
            $type = 'error';
            $title = 'Siswa gagal dihapus!';
        }
        toast($title, $type);
        return back();
    }

    public function validate_form(Request $request): array
    {
        return $request->validate([
            'teacher_id' => 'required',
            'nis' => 'required',
            'name' => 'required',
            'address' => 'required',
            'place_of_birth' => 'required',
            'date_of_birth' => 'required',
            'phone' => 'required',
            'gender' => 'required',
            'photo' => 'image|mimes:jpg,png,jpeg,max:2048'
        ]);
    }

    /**
     * @param Student $student
     * @param Request $request
     * @param bool $isUpdate
     * @return bool
     */
    public function insert_model(Student $student, Request $request, bool $isUpdate = false): bool
    {

        $student->setAttribute('teacher_id', $request->get('teacher_id'));
        $student->setAttribute('nis', $request->get('nis'));
        $student->setAttribute('name', $request->get('name'));
        $student->setAttribute('address', $request->get('address'));
        $student->setAttribute('place_of_birth', $request->get('place_of_birth'));
        $student->setAttribute('date_of_birth', $request->get('date_of_birth'));
        $student->setAttribute('phone', $request->get('phone'));
        $student->setAttribute('gender', $request->get('gender'));

        if ($request->file('photo')) {
            $clear_path = array_slice(explode('/', $student->photo), 1);
            Storage::delete(join('/', $clear_path));
            $path = $request->file('photo')->store('students/photo');
            $student->setAttribute('photo', 'storage/' . $path);
        } else {
            if (!$isUpdate) $student->setAttribute('photo', 'img/default-avatar.svg');
        }

        return $student->save();
    }
}

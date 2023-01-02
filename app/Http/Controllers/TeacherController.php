<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Storage;

class TeacherController extends Controller
{

    private array $genders = [
        'L' => 'Laki-Laki',
        'P' => 'Perempuan'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        return view('admin.teachers.index', [
            'teachers' => Teacher::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view('admin.teachers.create', [
            'teacher' => new Teacher(),
            'genders' => $this->genders
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return RedirectResponse|Response
     */
    public function store(Request $request): Response|RedirectResponse
    {
        $this->validate_form($request);
        $teacher = new Teacher();
        $result = $this->insert_model($teacher, $request);
        if ($result) {
            $type = 'success';
            $title = 'Guru berhasil ditambah!';
            toast($title, $type);
            return redirect(route('teacher.index'));
        } else {
            $type = 'error';
            $title = 'Guru gagal ditambah!';
            toast($title, $type);
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Teacher $teacher
     * @return Response
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Teacher $teacher
     * @return Application|Factory|View|Response
     */
    public function edit(Teacher $teacher): View|Factory|Response|Application
    {
        return view('admin.teachers.edit', [
            'teacher' => $teacher,
            'genders' => $this->genders
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param Teacher $teacher
     * @return Application|Redirector|RedirectResponse
     */
    public function update(Request $request, Teacher $teacher): Redirector|RedirectResponse|Application
    {
        $this->validate_form($request);
        $update_result = $this->insert_model($teacher, $request, true);
        if ($update_result) {
            $type = 'success';
            $title = 'Guru berhasil diupdate!';
            toast($title, $type);
            return redirect(route('teacher.index'));
        } else {
            $type = 'error';
            $title = 'Guru gagal diupdate!';
            toast($title, $type);
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Teacher $teacher
     * @return RedirectResponse|Response
     */
    public function destroy(Teacher $teacher): Response|RedirectResponse
    {
        $result = $teacher->delete();
        $clear_path = array_slice(explode('/', $teacher->photo), 1);
        Storage::delete(join('/', $clear_path));
        if ($result) {
            $type = 'success';
            $title = 'Guru berhasil dihapus!';
        } else {
            $type = 'error';
            $title = 'Guru gagal dihapus!';
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
            'nip' => 'required',
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
     * @param Teacher $teacher
     * @param Request $request
     * @return bool
     */
    public function insert_model(Teacher $teacher, Request $request, bool $isUpdate = false): bool
    {
        $teacher->setAttribute('nip', $request->get('nip'));
        $teacher->setAttribute('name', $request->get('name'));
        $teacher->setAttribute('address', $request->get('address'));
        $teacher->setAttribute('place_of_birth', $request->get('place_of_birth'));
        $teacher->setAttribute('date_of_birth', $request->get('date_of_birth'));
        $teacher->setAttribute('phone', $request->get('phone'));
        $teacher->setAttribute('gender', $request->get('gender'));

        if ($request->file('photo')) {
            $clear_path = array_slice(explode('/', $teacher->photo), 1);
            Storage::delete(join('/', $clear_path));
            $path = $request->file('photo')->store('teachers/photo');
            $teacher->setAttribute('photo', 'storage/' . $path);
        } else {
            if (!$isUpdate) $teacher->setAttribute('photo', 'img/default-avatar.svg');
        }
        return $teacher->save();
    }
}

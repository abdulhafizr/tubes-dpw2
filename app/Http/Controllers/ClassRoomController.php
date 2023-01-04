<?php

namespace App\Http\Controllers;

use App\Models\ClassRoom;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Storage;

class ClassRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $class_rooms = ClassRoom::query()->paginate(10);
        return view('admin.classes.index', [
            'class_rooms' => $class_rooms
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view("admin.classes.create", [
            "class_room" => new ClassRoom(),
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
        $class_room = new ClassRoom();
        $insert_result = $this->insert_model($class_room, $request);
        if ($insert_result) {
            $type = 'success';
            $title = 'Ruang Kelas berhasil ditambah!';
            toast($title, $type);
            return redirect(route('class-room.index'));
        } else {
            $type = 'error';
            $title = 'Ruang Kelas gagal ditambah!';
            toast($title, $type);
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param ClassRoom $class_room
     * @return Response
     */
    public function show(ClassRoom $class_room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ClassRoom $class_room
     * @return Application|Factory|View
     */
    public function edit(ClassRoom $class_room): View|Factory|Application
    {
        return view("admin.classes.edit", [
            "class_room" => $class_room,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param ClassRoom $class_room
     * @return Application|Redirector|RedirectResponse
     */
    public function update(Request $request, ClassRoom $class_room): Redirector|RedirectResponse|Application
    {
        $this->validate_form($request);
        $result = $this->insert_model($class_room, $request, true);
        if ($result) {
            $type = 'success';
            $title = 'Ruang Kelas berhasil diupdate!';
            toast($title, $type);
            return redirect(route('class-room.index'));
        } else {
            $type = 'error';
            $title = 'Ruang Kelas gagal diupdate!';
            toast($title, $type);
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ClassRoom $class_room
     * @return Response|RedirectResponse
     */
    public function destroy(ClassRoom $class_room): Response|RedirectResponse
    {
        $result = $class_room->delete();
        $clear_path = array_slice(explode('/', $class_room->photo), 1);
        Storage::delete(join('/', $clear_path));
        if ($result) {
            $type = 'success';
            $title = 'Ruang Kelas berhasil dihapus!';
        } else {
            $type = 'error';
            $title = 'Ruang Kelas gagal dihapus!';
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
            'code' => 'required',
            'name' => 'required',
            'tables_amount' => 'required|numeric',
            'chairs_amount' => 'required|numeric',
            'projector_amount' => 'required|numeric',
            'ac_amount' => 'required|numeric',
            'clipboard_amount' => 'required|numeric',
        ]);
    }

    /**
     * @param ClassRoom $class_room
     * @param Request $request
     * @return bool
     */
    public function insert_model(ClassRoom $class_room, Request $request, bool $isUpdate = false): bool
    {
        $class_room->setAttribute('code', $request->get('code'));
        $class_room->setAttribute('name', $request->get('name'));
        $class_room->setAttribute('tables_amount', $request->get('tables_amount'));
        $class_room->setAttribute('chairs_amount', $request->get('chairs_amount'));
        $class_room->setAttribute('projector_amount', $request->get('projector_amount'));
        $class_room->setAttribute('ac_amount', $request->get('ac_amount'));
        $class_room->setAttribute('clipboard_amount', $request->get('clipboard_amount'));

        if ($request->file('photo')) {
            $clear_path = array_slice(explode('/', $class_room->photo), 1);
            Storage::delete(join('/', $clear_path));
            $path = $request->file('photo')->store('class_rooms/photo');
            $class_room->setAttribute('photo', 'storage/' . $path);
        } else {
            if (!$isUpdate) $class_room->setAttribute('photo', 'img/default-avatar.svg');
        }

        return $class_room->save();
    }
}

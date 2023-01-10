<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Student;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Storage;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index(): View|Factory|Response|Application
    {
        $inventories = Inventory::query()->paginate(10);
        return view('admin.inventories.index', [
            'inventories' => $inventories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create(): View|Factory|Response|Application
    {
        return view('admin.inventories.create', [
            'inventory' => new Inventory()
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
        $inventory = new Inventory();
        $result = $this->insert_model($inventory, $request);
        if ($result) {
            $type = 'success';
            $title = 'Inventori berhasil ditambah!';
            toast($title, $type);
            return redirect(route('inventory.index'));
        } else {
            $type = 'error';
            $title = 'Inventori gagal ditambah!';
            toast($title, $type);
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Inventory $inventory
     * @return Response
     */
    public function show(Inventory $inventory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Inventory $inventory
     * @return Application|Factory|View|Response
     */
    public function edit(Inventory $inventory): View|Factory|Response|Application
    {
        return view('admin.inventories.edit', [
            'inventory' => $inventory
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Inventory $inventory
     * @return Application|Redirector|RedirectResponse
     */
    public function update(Request $request, Inventory $inventory): Redirector|RedirectResponse|Application
    {
        $this->validate_form($request);
        $result = $this->insert_model($inventory, $request, true);
        if ($result) {
            $type = 'success';
            $title = 'Inventori berhasil diupdate!';
            toast($title, $type);
            return redirect(route('inventory.index'));
        } else {
            $type = 'error';
            $title = 'Inventori gagal diupdate!';
            toast($title, $type);
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Inventory $inventory
     * @return RedirectResponse
     */
    public function destroy(Inventory $inventory): RedirectResponse
    {
        $result = $inventory->delete();
        $clear_path = array_slice(explode('/', $inventory->photo), 1);
        Storage::delete(join('/', $clear_path));
        if ($result) {
            $type = 'success';
            $title = 'Inventori berhasil dihapus!';
        } else {
            $type = 'error';
            $title = 'Inventori gagal dihapus!';
        }
        toast($title, $type);
        return back();
    }

    public function validate_form(Request $request): array
    {
        return $request->validate([
            'name' => 'required',
            'total' => 'required',
            'stock' => 'required',
            'photo' => 'image|mimes:jpg,png,jpeg,max:2048'
        ]);
    }

    /**
     * @param Inventory $inventory
     * @param Request $request
     * @param bool $isUpdate
     * @return bool
     */
    public function insert_model(Inventory $inventory, Request $request, bool $isUpdate = false): bool
    {

        $inventory->setAttribute('name', $request->get('name'));
        $inventory->setAttribute('total', $request->get('total'));
        $inventory->setAttribute('stock', $request->get('stock'));
        $inventory->setAttribute('used', $request->get('used'));
        $inventory->setAttribute('broken', $request->get('broken'));

        if ($request->file('photo')) {
            $clear_path = array_slice(explode('/', $inventory->photo), 1);
            Storage::delete(join('/', $clear_path));
            $path = $request->file('photo')->store('inventories/photo');
            $inventory->setAttribute('photo', 'storage/' . $path);
        } else {
            if (!$isUpdate) $inventory->setAttribute('photo', 'img/default-avatar.svg');
        }

        return $inventory->save();
    }
}

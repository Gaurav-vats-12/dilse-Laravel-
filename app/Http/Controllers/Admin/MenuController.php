<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Menu\StoreMenuRequest;
use App\Models\Admin\Menu;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Menu    = Menu::all();
        confirmDelete('Delete Menu!',"Are you sure you want to delete?");
       return view('admin.page.menu.index',compact('Menu'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.page.menu.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMenuRequest $request)
    {
        Menu::insert(['menu_name' => $request->menu_name, 'menu_slug' => $request->menu_slug,'status' => $request->status,'created_at' => now(), 'updated_at' => now() ]);
        return redirect()->route('admin.menu.index')->withSuccess('Menu Successfully Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $Menu = Menu::findOrFail($id);
        return view('admin.page.menu.edit',compact('Menu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreMenuRequest $request, string $id)
    {
        Menu::findOrFail($id)->update(['menu_name' => $request->menu_name, 'menu_slug' => $request->menu_slug,'status' => $request->status,'updated_at' => now() ]);
        return redirect()->route('admin.menu.index')->withSuccess('Menu Successfully Updated');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Menu::findOrFail($id)->delete();
        return redirect()->route('admin.menu.index')->withSuccess('Menu Successfully Deleted');

    }
}

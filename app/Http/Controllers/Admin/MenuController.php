<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Menu\StoreMenuRequest;
use App\Models\Admin\Menu;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Menu    = Menu::all();
       return view('admin.page.menu.index',compact('Menu'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.page.menu.create_and_edit');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMenuRequest $request)
    {
        Menu::insert(['menu_name' => $request->menu_name, 'menu_slug' => $request->menu_slug,'status' => $request->status,'created_at' => now(), 'updated_at' => now() ]);
        return redirect()->route('admin.menu.index')->with('message','Menu  Created Successfully');
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
    public function edit(string $id): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $Menu = Menu::findOrFail($id);
        return view('admin.page.menu.create_and_edit',compact('Menu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreMenuRequest $request, string $id)
    {
        Menu::findOrFail($id)->update(['menu_name' => $request->menu_name, 'menu_slug' => $request->menu_slug,'status' => $request->status,'updated_at' => now() ]);
        notyf()->duration(2000) ->addSuccess('Menu  Updated Successfully.');
         return redirect()->route('admin.menu.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Menu::findOrFail($id)->delete();
        notyf()->duration(2000) ->addSuccess('Menu  Deleted Successfully.');
        return redirect()->route('admin.menu.index');
    }
}

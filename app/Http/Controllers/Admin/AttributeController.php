<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Attributes\StoreAttributeRequest;
use App\Models\Admin\Attributes;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.page.attributes.index', ['Attributes' => Attributes::orderByDesc('id')->get()]);

    }

    /**
     * Show the form for creating a new resource.
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.page.attributes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAttributeRequest $request): RedirectResponse
    {

        Attributes::create(['attributes_name' => $request->attributes_name, 'attributes_type' => $request->attributes_type, 'status' => (int)$request->status, 'created_at' => now(), 'updated_at' => now()]);
        notyf()->duration(duration: 2000)->addSuccess(message: 'Attribute  Created Successfully.');
        return redirect()->route(route: 'admin.manage-attributes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     * @param string $id
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function edit(string $id): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.page.attributes.edit', ['attributes' => Attributes::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     * @param StoreAttributeRequest $request
     * @param string $id
     * @return RedirectResponse
     */
    public function update(StoreAttributeRequest $request, string $id): RedirectResponse
    {

        Attributes::findOrFail($id)->update(array('attributes_name' => $request->attributes_name, 'attributes_type' => $request->attributes_type, 'status' =>  (int)$request->status, 'updated_at' => now()));
        notyf()->duration(2000)->addSuccess('Attribute  Updated Successfully.');
        return redirect()->route('admin.manage-attributes.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param string $id
     * @return RedirectResponse
     */
    public function destroy(string $id): RedirectResponse
    {
        Attributes::findOrFail($id)->delete();
        notyf()->duration(2000)->addSuccess('Attribute Deleted Successfully.');
        return redirect()->route('admin.manage-attributes.index');
    }
}

<?php

namespace App\Http\Controllers\Admin;
use App\Models\Admin\Attributes;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Attributes\StoreAttributeRequest;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.page.attributes.index',['Attributes'=>Attributes::orderBy('id', 'DESC')->get()]);



    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {



       return view('admin.page.attributes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAttributeRequest $request)
    {
        Attributes::create(['attributes_name' => $request->attributes_name, 'attributes_type' => $request->attributes_type,'status'=> (isset($request->status)) ? 1 : 0,'created_at' => now(),'updated_at' => now()]);
        notyf()->duration(2000) ->addSuccess('Attribute  Created Successfully.');
        return redirect()->route('admin.manage-attributes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.page.attributes.edit',['attributes'=>Attributes::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreAttributeRequest $request, string $id)
    {
        Attributes::findOrFail($id)->update(['attributes_name' => $request->attributes_name, 'attributes_type' => $request->attributes_type,'status'=> (isset($request->status)) ? 1 : 0,'updated_at' => now()]);
        notyf()->duration(2000) ->addSuccess('Attribute  Updated Successfully.');
        return redirect()->route('admin.manage-attributes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Attributes::findOrFail($id)->delete();
        notyf()->duration(2000) ->addSuccess('Attribute Deleted Successfully.');
        return redirect()->route('admin.manage-attributes.index');

    }
}

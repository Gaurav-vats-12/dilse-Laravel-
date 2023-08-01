<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\Admin\Pages\StorepagesRequest;
use App\Models\Admin\Page;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class PageManagementController extends Controller
{
    public function index()
    {
        confirmDelete('Delete Page!',"Are you sure you want to delete?");
        $page    = Page::get();
         return view('admin.Pages.index',compact('page'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.Pages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorepagesRequest $request)
    {
           Page::insert(['pagesuuid' => $request->pagesuuid, 'page_title' => $request->page_title, 'page_slug' => $request->page_slug,'page_content' => $request->page_content,'status' => $request->status,'created_at' => now(), 'updated_at' => now() ]);
        return redirect()->route('admin.manage-pages.index')->withSuccess('Page Successfully Created');
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
        $page = Page::findOrFail($id);
        return view('admin.Pages.edit' ,compact('page'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorepagesRequest $request, string $id)
    {
        Page::findOrFail($id)->update(['page_title' => $request->page_title, 'page_slug' => $request->page_slug,'page_content' => $request->page_content,'status' => $request->status,'updated_at' => now() ]);
        return redirect()->route('admin.manage-pages.index')->withSuccess('Page Successfully Updated');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $page =  Page::findOrFail($id);
        $page->delete();
        return redirect()->route('admin.manage-pages.index')->withSuccess('Page Successfully Deleted');

    }

}

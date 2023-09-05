<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\Admin\Pages\{StorepagesRequest, UpdatePagesRequest};
use App\Models\Admin\Page;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class PageManagementController extends Controller
{
    public function index()
    {
        $page    = Page::get();
         return view('admin.page.pages.index',compact('page'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.page.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorepagesRequest $request)
    {
           Page::insert(['pagesuuid' => $request->pagesuuid, 'page_title' => $request->page_title, 'page_slug' => $request->page_slug,'page_content' => $request->page_content,'page_meta_title' => $request->page_meta_title,'page_meta_description' => $request->page_meta_description,'status' => $request->status,'created_at' => now(), 'updated_at' => now() ]);
           notyf()->duration(2000) ->addSuccess('Page Successfully Created.');
           return redirect()->route('admin.manage-pages.index');
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
        return view('admin.page.pages.edit' ,compact('page'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePagesRequest $request, string $id)
    {
        Page::findOrFail($id)->update(['page_title' => $request->page_title,'page_slug' => Page::findOrFail($id)->page_slug,'page_meta_title' => $request->page_meta_title,'page_meta_description' => $request->page_meta_description,'status' => $request->status, 'updated_at' => now() ]);
        notyf()->duration(2000) ->addSuccess('Page Updated Successfully.');
        return redirect()->route('admin.manage-pages.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $page =  Page::findOrFail($id);
        $page->delete();
        notyf()->duration(2000) ->addSuccess('Page Deleted Successfully.');
        return redirect()->route('admin.manage-pages.index');
    }

}

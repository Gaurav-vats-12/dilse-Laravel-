<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Pages\StorepagesRequest;
use App\Http\Requests\Admin\Pages\UpdatePagesRequest;
use App\Models\Admin\Page;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class PageManagementController extends Controller
{
  /**
   * @return View|\Illuminate\Foundation\Application|Factory|Application
   */
  public function index(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $page = Page::orderByDesc('id')->get();
        return view('admin.page.pages.index', compact('page'));
    }

  /**
   * Show the form for creating a new resource.
   * @return View|\Illuminate\Foundation\Application|Factory|Application
   */
    public function create(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('admin.page.pages.create');
    }

  /**
   * Store a newly created resource in storage.
   * @param StorepagesRequest $request
   * @return RedirectResponse
   */
    public function store(StorepagesRequest $request): RedirectResponse
    {
        Page::insert(['pagesuuid' => $request->pagesuuid, 'page_title' => $request->page_title, 'page_slug' => $request->page_slug, 'page_content' => $request->page_content, 'page_meta_title' => $request->page_meta_title, 'page_meta_description' => $request->page_meta_description, 'status' => $request->status, 'created_at' => now(), 'updated_at' => now()]);
        notyf()->duration(2000)->addSuccess('Page Successfully Created.');
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
   * @param string $id
   * @return View|\Illuminate\Foundation\Application|Factory|Application
   */
    public function edit(string $id): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $page = Page::findOrFail($id);
        return view('admin.page.pages.edit', compact('page'));

    }

  /**
   * Update the specified resource in storage.
   * @param UpdatePagesRequest $request
   * @param string $id
   * @return RedirectResponse
   */
    public function update(UpdatePagesRequest $request, string $id): RedirectResponse
    {
        Page::findOrFail($id)->update(['page_title' => $request->page_title, 'page_slug' => Page::findOrFail($id)->page_slug, 'page_meta_title' => $request->page_meta_title, 'page_meta_description' => $request->page_meta_description, 'status' => $request->status, 'updated_at' => now()]);
        notyf()->duration(2000)->addSuccess('Page Updated Successfully.');
        return redirect()->route('admin.manage-pages.index');
    }

  /**
   * Remove the specified resource from storage.
   * @param string $id
   * @return RedirectResponse
   */
    public function destroy(string $id): RedirectResponse
    {
        $page = Page::findOrFail($id);
        $page->delete();
        notyf()->duration(2000)->addSuccess('Page Deleted Successfully.');
        return redirect()->route('admin.manage-pages.index');
    }

}

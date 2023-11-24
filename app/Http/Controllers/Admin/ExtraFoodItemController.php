<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\Admin\ExtraItems\StoreExtaItemsRequest;
use App\Http\Requests\Admin\ExtraItems\UpdateExtaItemsRequest;

use App\Models\Admin\ExtraItem;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image as ResizeImage;

class ExtraFoodItemController extends Controller
{

  /**
   * @return View|\Illuminate\Foundation\Application|Factory|Application
   */
  public function index(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $items = ExtraItem::get();
        return view('admin.page.extra_items.index', compact('items'));
    }

  /**
   * @return Application|Factory|View|\Illuminate\Foundation\Application
   */
  public function create(): View|\Illuminate\Foundation\Application|Factory|Application
  {
        return view('admin.page.extra_items.create');
    }

  /**
   * @param StoreExtaItemsRequest $request
   * @return mixed
   */
  public function store(StoreExtaItemsRequest $request): mixed
  {
        if ($request->hasFile('extra_product_image') && $request->file('extra_product_image')->isValid()) {
            $product_image = $request->file('extra_product_image');
            $ProductImage = time() . '-' . $product_image->getClientOriginalName();
            $sitepath = public_path('storage/products/addon');!is_dir($sitepath) && mkdir($sitepath, 0777, true);
            ResizeImage::make($product_image)->resize(303, 287)->save($sitepath . '/' . $ProductImage);
        }
        ExtraItem::create(['name' => $request->name,
            'description' => $request->description, 'price' => $request->price,
            'image' => $ProductImage,
            'status' => (isset($request->status)) ? 1 : 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect(route('admin.extra-items.index'))->withSuccess('Extra Item Created Successfully', 500);
    }

  /**
   * @param $id
   * @return View|\Illuminate\Foundation\Application|Factory|RedirectResponse|Application
   */
  public function edit($id): View|\Illuminate\Foundation\Application|Factory|\Illuminate\Http\RedirectResponse|Application
    {
        $checkId = ExtraItem::where('id', $id)->count();
        if ($checkId == 0) {
            return redirect()->back();
        }
        $extraItem = ExtraItem::where('id', $id)->first();
        return view('admin.page.extra_items.edit', compact('extraItem'));
    }

  /**
   * @param UpdateExtaItemsRequest $request
   * @param $id
   * @return mixed
   */
  public function update(UpdateExtaItemsRequest $request, $id): mixed
  {

        $FoodItem = ExtraItem::findOrFail($id);

        if ($request->hasFile('extra_product_image') && $request->file('extra_product_image')->isValid()) {
            $product_image = $request->file('extra_product_image');
            $ProductImage = time() . '-' . $product_image->getClientOriginalName();
            $sitepath = public_path('storage/products/addon');!is_dir($sitepath) && mkdir($sitepath, 0777, true);
            ResizeImage::make($product_image)->resize(303, 287)->save($sitepath . '/' . $ProductImage);
            DeleteOldImage($sitepath . '/' . $FoodItem->image);
        } else {
            $ProductImage = $FoodItem->image;
        }
        ExtraItem::findOrFail($id)->update(['name' => $request->name,
            'description' => $request->description, 'price' => $request->price,
            'image' => $ProductImage,
            'status' => (isset($request->status)) ? 1 : 0,
            'updated_at' => now(),
        ]);
        return redirect(route('admin.extra-items.index'))->withSuccess('Extra Item Updated Successfully', 500);
    }

  /**
   * @param Request $request
   * @param $id
   * @return string
   */
  public function destroy(Request $request, $id): string
  {
        try {
            $user_id = $request->user_id;
            ExtraItem::findOrFail($id)->delete();
            return redirect(route('admin.extra-items.index'))->withSuccess('Extra Item Deleted!', 500);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}

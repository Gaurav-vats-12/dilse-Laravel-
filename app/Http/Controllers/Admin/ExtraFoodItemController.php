<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\Admin\ExtraItems\StoreExtaItemsRequest;
use App\Http\Requests\Admin\ExtraItems\UpdateExtaItemsRequest;

use App\Models\Admin\ExtraItem;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image as ResizeImage;

class ExtraFoodItemController extends Controller
{

    public function index()
    {
        $items = ExtraItem::get();
        return view('admin.page.extra_items.index', compact('items'));
    }

    public function create()
    {
        return view('admin.page.extra_items.create');
    }

    public function store(StoreExtaItemsRequest $request)
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

    public function edit($id)
    {
        $checkId = ExtraItem::where('id', $id)->count();
        if ($checkId == 0) {
            return redirect()->back();
        }

        $extraItem = ExtraItem::where('id', $id)->first();
        return view('admin.page.extra_items.edit', compact('extraItem'));
    }

    public function update(UpdateExtaItemsRequest $request, $id)
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

    public function destroy(Request $request, $id)
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

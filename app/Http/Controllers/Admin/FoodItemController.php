<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use App\Http\Requests\Admin\FoodItems\StoreFoodItemRequest;
use App\Http\Requests\Admin\FoodItems\UpdateFoodItemRequest;
use App\Models\Admin\Attributes;
use App\Models\Admin\ExtraFoodItems;
use App\Models\Admin\ExtraItem;
use App\Models\Admin\FoodAttribute;

use App\Models\Admin\FoodItem;

use App\Models\Admin\Menu;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image as ResizeImage;

class FoodItemController extends Controller
{
    /**
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function index(): View | \Illuminate\Foundation\Application  | \Illuminate\Contracts\View\Factory  | \Illuminate\Contracts\Foundation\Application
    {
        $foodItems = FoodItem::with(['menu'])->orderByDesc('id')->get();
        return view(view: 'admin.page.food_items.index', data: compact('foodItems'));
    }

    /**
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function create(): View | Application | Factory | \Illuminate\Contracts\Foundation\Application
    {
        $menus = Menu::where('status', 'active')->get();
        $attribuite = Attributes::where('attributes_type', 'other')->where('status', 1)->get();
        $exta_items = ExtraItem::where('status', 1)->get();
        return view('admin.page.food_items.create', compact('menus', 'exta_items', 'attribuite'));
    }

    /**
     * @param StoreFoodItemRequest $request
     * @return RedirectResponse
     */
    public function store(StoreFoodItemRequest $request): \Illuminate\Http\RedirectResponse
    {
        if ($request->hasFile('product_image') && $request->file('product_image')->isValid()) {
            $product_image = $request->file('product_image');
            $ProductImage = time() . '-' . $product_image->getClientOriginalName();
            $sitepath = public_path('storage/products');!is_dir($sitepath) && mkdir($sitepath, 0777, true);
            // $img = ResizeImage::make($banner_image->path ResizeImage::make($request->file('banner_image'))->resize(1440, 674)->save($destinationPath.'/'. $bannerImage);());
            ResizeImage::make($product_image)->save($sitepath . '/' . $ProductImage, 80);
        }
        $restaurant = FoodItem::create(['name' => $request->name, 'menu_id' => $request->menu, 'description' => $request->description, 'price' => $request->price, 'image' => $ProductImage, 'extra_items' => (isset($request->extra_items)) ? 1 : 0, 'featured' => (isset($request->featured)) ? 1 : 0, 'status' => (isset($request->status)) ? 1 : 0, 'created_at' => now(), 'updated_at' => now()]);
        if (isset($request->spicy_lavel)) {
            foreach ($request->spicy_lavel as $key => $value) {
                FoodAttribute::create(['food_item_id' => $restaurant->id, 'food_attribute_id' => $value, 'created_at' => now(), 'updated_at' => now()]);
            }
        }
        notyf()->duration(2000)->addSuccess('Food Item  Added Successfully.');
        return redirect()->route('admin.food-items.index');
    }

    /**
     * @param $id
     * @return View|Application|Factory|RedirectResponse|\Illuminate\Contracts\Foundation\Application
     */
    public function edit($id): View | Application | Factory | RedirectResponse | \Illuminate\Contracts\Foundation\Application
    {
        $attribuite = Attributes::where('attributes_type', 'other')->where('status', 1)->get();

        $checkId = FoodItem::where('id', $id)->count();
        if ($checkId == 0) {
            return redirect()->back();
        }

        $foodItem = FoodItem::with(['menu', 'ExtraFoodItems', 'attributes'])->where('id', $id)->first();
        $extraFoodItems = $foodItem->ExtraFoodItems->pluck('extra_item_id')->toArray();
        $exta_items = ExtraItem::where('status', 1)->pluck('name', 'id');
        $food_attribute_id = $foodItem->attributes()->pluck('food_attribute_id')->toArray();
        $menus = Menu::pluck('menu_name', 'id');
        return view('admin.page.food_items.edit', compact('foodItem', 'menus', 'exta_items', 'extraFoodItems', 'food_attribute_id', 'attribuite'));
    }

    /**
     * @param UpdateFoodItemRequest $request
     * @param string $id
     * @return RedirectResponse
     */
    public function update(UpdateFoodItemRequest $request, string $id): RedirectResponse
    {

        $FoodItem = FoodItem::findOrFail($id);

        if ($request->hasFile('product_image') && $request->file('product_image')->isValid()) {
            $sitepath = public_path('storage/products');!is_dir($sitepath) && mkdir($sitepath, 0777, true);
            $product_image = $request->file('product_image');
            $ProductImage = time() . '-' . $product_image->getClientOriginalName();
            DeleteOldImage($sitepath . '/' . $FoodItem->image);
            ResizeImage::make($product_image)->save($sitepath . '/' . $ProductImage, 80);
        } else {
            $ProductImage = $FoodItem->image;
        }
        // dd([
        //     'name' => $request->name,
        //     'menu_id' => $request->menu,
        //     'description' => $request->product_description,
        //     'price' => $request->price,
        //     'image' => $ProductImage,
        //     'extra_items' => (isset($request->extra_items)) ? 1 : 0,
        //     'featured' => (isset($request->featured)) ? 1 : 0,
        //     'status' => $request->status,
        //     'updated_at' => now(),
        // ]);

        FoodItem::findOrFail($id)->update([
            'name' => $request->name,
            'menu_id' => $request->menu,
            'description' => $request->product_description,
            'price' => $request->price,
            'image' => $ProductImage,
            'extra_items' => (isset($request->extra_items)) ? 1 : 0,
            'featured' => (isset($request->featured)) ? 1 : 0,
            'status' => $request->status,
            'updated_at' => now(),
        ]);
        if (isset($request->spicy_lavel)) {
            $newItems = [];
            $item = FoodAttribute::where([
                ['food_item_id', $id],
            ])->delete();
            foreach ($request->spicy_lavel as $key => $extraItem) {
                $newItems[$key]['food_item_id'] = $id;
                $newItems[$key]['food_attribute_id'] = $extraItem;
                $newItems[$key]['updated_at'] = now();
            };
            FoodAttribute::insert($newItems);

        } else {
            $item = FoodAttribute::where([
                ['food_item_id', $id],
            ])->delete();
        }
        notyf()->duration(2000)->addSuccess('Food Item  Updated Successfully.');
        return redirect()->route('admin.food-items.index');

    }

  /**
   * @param Request $request
   * @param $id
   * @return RedirectResponse
   */
  public function destroy(Request $request, $id): RedirectResponse
    {
        FoodItem::findOrFail($id)->delete();
        notyf()->duration(2000)->addSuccess('Food Item  Deleted Successfully.');
        return redirect()->route('admin.food-items.index');
    }

    public function Ajax_request_toggal(Request $request , $id){
        FoodItem::findOrFail($id)->update([
            'status' => $request->isChecked,
            'updated_at' => now(),
        ]);
        return response()->json(['code' => 200, 'status' => 'success', "message" => "Food Item  Updated Successfully"]);

    }
}

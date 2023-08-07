<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Admin\{FoodItem,Menu};
use App\Http\Requests\Admin\FoodItems\{StoreFoodItemRequest,UpdateFoodItemRequest};
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as ResizeImage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;


class FoodItemController extends Controller
{

    public function index()
    {
        $foodItems = FoodItem::with(['menu'])->get();
        return view('admin.page.food_items.index',compact('foodItems'));
    }

    public function create()
    {
        $menus = Menu::where('status','active')->get();
        return view('admin.page.food_items.create',compact('menus'));
    }


    public function store(StoreFoodItemRequest $request)
    {
        if($request->hasFile('product_image') && $request->file('product_image')->isValid()){
            $product_image = $request->file('product_image');
            $ProductImage = time().'-'.$product_image->getClientOriginalName();
            $sitepath = public_path('storage/products'); !is_dir($sitepath) &&  mkdir($sitepath, 0777, true);
            ResizeImage::make( $product_image)->resize(303, 287)->save($sitepath.'/'. $ProductImage);
        }
          $restaurant = FoodItem::create([  'name' => $request->name, 'menu_id' => $request->menu_id, 'description' => $request->description, 'price' => $request->price,
                'image' => $ProductImage,
                'featured'=> (isset($request->featured)) ? 1 : 0,
                'status'=> (isset($request->status)) ? 1 : 0,
                'created_at' => now(),
                 'updated_at' => now()
            ]);

            return redirect(route('admin.food-items.index'))->withSuccess('Food Item Added Successfully');
        }catch(Exception $e){
            return $e->getMessage();
        }   
    }


    public function edit($id)
    {
        $checkId = FoodItem::where('id', $id)->count();
        if($checkId == 0){
           return redirect()->back();
        }

        $foodItem = FoodItem::with(['menu'])->where('id',$id)->first();
        $menus = Menu::pluck('menu_name','id');

        return view('admin.page.food_items.edit',compact('foodItem','menus'));
    }


    public function update(UpdateFoodItemRequest $request, string $id)
    {
        $FoodItem = FoodItem::findOrFail($id);

        if($request->hasFile('product_image') && $request->file('product_image')->isValid()){
            $sitepath = public_path('storage/products'); !is_dir($sitepath) &&  mkdir($sitepath, 0777, true);
            $product_image = $request->file('product_image');
            $ProductImage = time().'-'.$product_image->getClientOriginalName();
            DeleteOldImage($sitepath.'/'.$FoodItem->image);
            ResizeImage::make( $product_image)->resize(303, 287)->save($sitepath.'/'. $ProductImage);
            }else{
            $ProductImage = $FoodItem->image;
        }

        FoodItem::findOrFail($id)->update([ 'name' => $request->name, 'menu_id' => $request->menu_id, 'description' => $request->description, 'price' => $request->price,
        'image' => $ProductImage,
        'featured'=> (isset($request->featured)) ? 1 : 0,
        'status'=> (isset($request->status)) ? 1 : 0,
         'updated_at' => now()
    ]);
    return redirect()->route('admin.food-items.index')->withSuccess('Details Successfully Updated');



    }

    public function destroy(Request $request,$id)
        try{
            FoodItem::findOrFail($id)->delete();
            return redirect(route('admin.food-items.index'))->withSuccess('Food Item Deleted Successfully');
        }catch(Exception $e){
            return $e->getMessage();
        }
    }


}

<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Admin\{FoodItem,Menu,ExtraItem,ExtraFoodItems,Attributes,FoodAttribute};
use App\Http\Requests\Admin\FoodItems\{StoreFoodItemRequest,UpdateFoodItemRequest};
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as ResizeImage;
use Illuminate\Http\Request;


class FoodItemController extends Controller
{
    public function index()
    {
        $foodItems = FoodItem::with(['menu'])->orderBy('id', 'DESC')->get();
        return view(view: 'admin.page.food_items.index', data: compact('foodItems'));
    }

    public function create()
    {
        $menus = Menu::where('status','active')->get();
        $attribuite  = Attributes::where('attributes_type','other')->where('status',1)->get();
        $exta_items = ExtraItem::where('status',1)->get();
        return view('admin.page.food_items.create',compact('menus','exta_items','attribuite'));
    }


    public function store(StoreFoodItemRequest $request)
    {
        // dd($request->all());
        if($request->hasFile('product_image') && $request->file('product_image')->isValid()){
            $product_image = $request->file('product_image');
            $ProductImage = time().'-'.$product_image->getClientOriginalName();
            $sitepath = public_path('storage/products'); !is_dir($sitepath) &&  mkdir($sitepath, 0777, true);
            ResizeImage::make( $product_image)->save($sitepath.'/'. $ProductImage);
        }
        $restaurant = FoodItem::create(['name' => $request->name, 'menu_id' => $request->menu, 'description' => $request->description, 'price' => $request->price, 'image' => $ProductImage,'extra_items'=> (isset($request->extra_items)) ? 1 : 0,'featured'=> (isset($request->featured)) ? 1 : 0,'status'=> (isset($request->status)) ? 1 : 0,'created_at' => now(),'updated_at' => now()]);
         if(isset($request->spicy_lavel)){
                foreach ($request->spicy_lavel as $key => $value) {
                    FoodAttribute::create(['food_item_id' => $restaurant->id, 'food_attribute_id' => $value,'created_at' => now(),'updated_at' => now()]);
                }
          }
        notyf()->duration(2000) ->addSuccess('Food Item  Added Successfully.');
        return redirect()->route('admin.food-items.index');
    }


    public function edit($id)
    {
        $attribuite  = Attributes::where('attributes_type','other')->where('status',1)->get();

        $checkId = FoodItem::where('id', $id)->count();

        if($checkId == 0){
           return redirect()->back();
  }

        $foodItem = FoodItem::with(['menu','ExtraFoodItems','attributes'])->where('id',$id)->first();
        $extraFoodItems = $foodItem->ExtraFoodItems->pluck('extra_item_id')->toArray();
        $exta_items = ExtraItem::where('status',1)->pluck('name','id');
        $food_attribute_id = $foodItem->attributes()->pluck('food_attribute_id')->toArray();
        $menus = Menu::pluck('menu_name','id');
        return view('admin.page.food_items.edit',compact('foodItem','menus','exta_items','extraFoodItems','food_attribute_id','attribuite'));
    }


    public function update(UpdateFoodItemRequest $request, string $id)
    {
        dd($request->all);

        $FoodItem = FoodItem::findOrFail($id);

        if($request->hasFile('product_image') && $request->file('product_image')->isValid()){
            $sitepath = public_path('storage/products'); !is_dir($sitepath) &&  mkdir($sitepath, 0777, true);
            $product_image = $request->file('product_image');
            $ProductImage = time().'-'.$product_image->getClientOriginalName();
            DeleteOldImage($sitepath.'/'.$FoodItem->image);
            //ResizeImage::make( $product_image)->resize(303, 287)->save($sitepath.'/'. $ProductImage);
            ResizeImage::make( $product_image)->save($sitepath.'/'. $ProductImage);
            }else{
            $ProductImage = $FoodItem->image;
        }

        FoodItem::findOrFail($id)->update([
            'name' => $request->name,
            'menu_id' => $request->menu,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $ProductImage,
            'extra_items'=> (isset($request->extra_items)) ? 1 : 0,
            'featured'=> (isset($request->featured)) ? 1 : 0,
            'status'=> (isset($request->status)) ? 1 : 0,
            'updated_at' => now()
        ]);
        if(isset($request->spicy_lavel)){
        $newItems = [];
        $item = FoodAttribute::where([
            ['food_item_id',$id],
            ])->delete();
        foreach($request->spicy_lavel as $key =>$extraItem){
            $newItems[$key]['food_item_id'] = $id;
            $newItems[$key]['food_attribute_id'] = $extraItem;
            $newItems[$key]['updated_at'] = now();
        };
        FoodAttribute::insert($newItems);

    }else{
        $item = FoodAttribute::where([
            ['food_item_id',$id],
            ])->delete();
    }
        notyf()->duration(2000) ->addSuccess('Food Item  Updated Successfully.');

        return redirect()->route('admin.food-items.index');

    }

    public function destroy(Request $request,$id){
        FoodItem::findOrFail($id)->delete();
        notyf()->duration(2000) ->addSuccess('Food Item  Deleted Successfully.');
        return redirect()->route('admin.food-items.index');
    }
}

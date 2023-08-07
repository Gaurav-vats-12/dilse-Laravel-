<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Admin\{FoodItem,Menu};
use Illuminate\Http\Request;
use App\Http\Requests\{StoreFoodItems,UpdateFoodItems};
use File,Exception;


class FoodItemController extends Controller
{

    public function index()
    {
        $foodItems = FoodItem::with(['menu'])->get();
        return view('admin.food_items.index',compact('foodItems'));
    }

    public function create()
    {
        $menus = Menu::where('status','active')->get();
        return view('admin.food_items.create',compact('menus'));
    }

   
    public function store(StoreFoodItems $request)
    {
        try{
            $imageName = time().'.'.$request->logo_image->extension();
            $request->logo_image->move(public_path('storage/food-items/'), $imageName); 
    
            $restaurant = FoodItem::create([
                'name' => $request->name,
                'menu_id' => $request->menu_id,
                'description' => $request->description,
                'price' => $request->price,
                'image' => $imageName,
                'featured'=> (isset($request->featured)) ? $request->featured : 0,
                
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
        return view('admin.food_items.edit',compact('foodItem','menus'));
    }

  
    public function update(UpdateFoodItems $request, $id)
    {
        //dd($id);
       try{
            $foodItem = FoodItem::findOrFail($id);
            $foodItem->name = $request->name;
            $foodItem->menu_id = $request->menu_id;
            $foodItem->description = $request->description;
            $foodItem->price = $request->price;
            $foodItem->status = $request->status;
            $foodItem->featured = (isset($request->featured)) ? $request->featured : 0;
            
            if(isset($request->logo_image)){
                if($request->old_image != ''){
                    $image = public_path('storage/food-items/'.$request->old_image); 
                    if(File::exists($image))
                    {
                        unlink($image);
                    } 
                }
                $imageName = time().'.'.$request->logo_image->extension();
                $request->logo_image->move(public_path('storage/food-items/'), $imageName);
                $foodItem->image = $imageName;
            }
            $foodItem->save();
            
            return redirect(route('admin.food-items.index'))->withSuccess('Details Updated Successfully');

        }catch(Exception $e){
            return $e->getMessage();
        }   
        
    }

    public function destroy(Request $request,$id)
    {   
        try{
            FoodItem::findOrFail($id)->delete();
            return redirect(route('admin.food-items.index'))->withSuccess('Food Item Deleted Successfully');
        }catch(Exception $e){
            return $e->getMessage();
        }   
       
    }
}

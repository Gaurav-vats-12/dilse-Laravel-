<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Admin\{FoodItem,ExtraItem};
use Illuminate\Http\Request;
use App\Http\Requests\{StoreExtaItems,UpdateExtaItems};
use File,Exception;


class ExtraFoodItemController extends Controller
{
    
    public function index()
    {
        $items = ExtraItem::get();
        return view('admin.extra_items.index',compact('items'));
    }

    public function create()
    {
        return view('admin.extra_items.create');
    }

    public function store(StoreExtaItems $request)
    {
        try{
            $imageName = time().'.'.$request->logo_image->extension();
            $request->logo_image->move(public_path('storage/extraitems'), $imageName); 

            $restaurant = ExtraItem::create([
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'image' => $imageName,
            ]);
            return redirect(route('admin.extra-items.index'))->withSuccess('Extra Item Created Successfully');
        }catch(Exception $e){
            return $e->getMessage();
        }   

    }

    public function edit($id)
    {
        $checkId = ExtraItem::where('id', $id)->count();
        if($checkId == 0){
           return redirect()->back();
        }

        $extraItem = ExtraItem::where('id',$id)->first();
        return view('admin.extra_items.edit',compact('extraItem'));
    }

  
    public function update(UpdateExtaItems $request, $id)
    {
       
        try{
            $extraItem = ExtraItem::findOrFail($id);
            $extraItem->name = $request->name;
            $extraItem->description = $request->description;
            $extraItem->price = $request->price;
            $extraItem->status = $request->status;
            
            if(isset($request->logo_image)){
                if($request->old_image != ''){
                    $image = public_path('storage/extraitems'.$request->old_image); 
                    if(File::exists($image))
                    {
                        unlink($image);
                    } 
                }
                $imageName = time().'.'.$request->logo_image->extension();
                $request->logo_image->move(public_path('storage/extraitems'), $imageName);
                $extraItem->image = $imageName;
            }

            $extraItem->save();
            return redirect(route('admin.extra-items.index'))->withSuccess('Extra Item Updated Successfully');
        }catch(Exception $e){
            return $e->getMessage();
        }     
    }

    public function destroy(Request $request,$id)
    {
        try{
            $user_id =$request->user_id;
            ExtraItem::findOrFail($id)->delete();
            return redirect(route('admin.extra-items.index'))->withSuccess('Extra Item Deleted!');
        }catch(Exception $e){
            return $e->getMessage();
        } 
    }
}

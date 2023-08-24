<?php

namespace App\Http\Controllers;
use App\Models\Admin\{Banner,Testimonial,Page,FoodItem,Gallery};
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use App\Models\Order\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function Homepage(){
        $recipientEmail = 'bheemexoticait@gmail.com';
        $subject = 'Subject of the Email';
        $message = 'This is the content of the email.';
        Mail::raw($message, function ($mail) use ($recipientEmail, $subject) {
            $mail->to($recipientEmail);
            $mail->subject($subject);
        });
        dd('Mail Send');
        $banner = Banner::where(['banner_type' => 'home'])->where('status','active')->get();
        $FoodItem = FoodItem::where('extra_items',0)->where('featured',1)->where('status',1)->limit(3)->get();
        $Testimonial = Testimonial::where('status','active')->get();

        return view('Home',compact('banner','Testimonial','FoodItem'));
    }

    public function aboutus(){
        return view('Pages.about');
    }
    public function gallery(){
        return view('Pages.gallery')->with('gallery',Gallery::where('status',1)->orderBy('image_postion', 'desc')->get());

    }

    public function giftCard(){
        return view('Pages.gift-card');
    }

    public function sendEmail() {

        $recipientEmail = 'shaurya.dograexoticait@gmail.com';
        $subject = 'Subject of the Email';
        $message = 'This is the content of the email.';

        Mail::raw($message, function ($mail) use ($recipientEmail, $subject) {
            $mail->to($recipientEmail);
            $mail->subject($subject);
        });

        return "Email sent successfully!";
     }

    /**
     * @param $id
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function  order_confirm(Request $request , $id): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $orderWithItems = Order::with('OrderItems')->find($id);
        $productIds = $orderWithItems->OrderItems->pluck('id')->all();

$product = FoodItem::whereIn('id', $productIds)->get();

      //  $product = FoodItem::find($productIds[0]);
       // dd($product->id) ;
    // If you want to dump and die the $product variable, do it here:
    // dd($product);

    return view('Pages.order-confirmation-templates', [
        'orderItem' => $orderWithItems,
        'product' => $product
    ]);

    }



}

<?php

namespace App\Http\Controllers;

use App\Models\Admin\{Banner, Testimonial, Page, FoodItem, Gallery};
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use App\Models\Order\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Mail;
use JetBrains\PhpStorm\NoReturn;

class HomeController extends Controller
{
    public function Homepage()
    {
        $banner = Banner::where(['banner_type' => 'home'])->where('status', 'active')->get();
        $FoodItem = FoodItem::where('extra_items', 0)->where('featured', 1)->where('status', 1)->limit(3)->get();
        $Testimonial = Testimonial::where('status', 'active')->get();

        return view('Home', compact('banner', 'Testimonial', 'FoodItem'));
    }

    public function aboutus()
    {
        return view('Pages.about');
    }
    public function gallery()
    {
        return view('Pages.gallery')->with('gallery', Gallery::where('status', 1)->orderBy('image_postion', 'desc')->get());
    }

    public function giftCard()
    {
        return view('Pages.gift-card');
    }

    public function sendEmail()
    {

        $recipientEmail = 'shaurya.dograexoticait@gmail.com';
        $subject = 'Subject of the Email';
        $message = 'This is the content of the email.';

        Mail::raw($message, function ($mail) use ($recipientEmail, $subject) {
            $mail->to($recipientEmail);
            $mail->subject($subject);
        });

        return "Email sent successfully!";
    }





    #[NoReturn] public  function update_location(Request $request): void
    {
        dd($request->all());
    }
}

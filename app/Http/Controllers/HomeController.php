<?php

namespace App\Http\Controllers;

use App\Models\Admin\Banner;
use App\Models\Admin\FoodItem;
use App\Models\Admin\Gallery;
use App\Models\Admin\Testimonial;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use JetBrains\PhpStorm\NoReturn;

class HomeController extends Controller
{
  /**
   * @return View|\Illuminate\Foundation\Application|Factory|Application
   */
  public function Homepage(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $banner = Banner::where(['banner_type' => 'home'])->where('status', 'active')->get();
        $FoodItem = FoodItem::where('extra_items', 0)->where('featured', 1)->where('status', 1)->limit(3)->get();
        $Testimonial = Testimonial::where('status', 'active')->get();
        return view('Home', compact('banner', 'Testimonial', 'FoodItem'));
    }

  /**
   * @return View|\Illuminate\Foundation\Application|Factory|Application
   */
  public function aboutus(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('Pages.about');
    }

  /**
   * @return View|\Illuminate\Foundation\Application|Factory|Application
   */
  public function gallery(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('Pages.gallery')->with('gallery', Gallery::where('status', 1)->orderBy('image_postion', 'desc')->get());
    }

  /**
   * @return View|\Illuminate\Foundation\Application|Factory|Application
   */
  public function giftCard(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('Pages.gift-card');
    }

  /**
   * @return string
   */
  public function sendEmail(): string
    {
        $recipientEmail = 'bheemexoticait@gmail.com';
        $subject = 'Subject of the Email';
        $message = 'This is the content of the email.';
        Mail::raw($message, function ($mail) use ($recipientEmail, $subject) {
            $mail->to($recipientEmail);
            $mail->subject($subject);
        });
        return "Email sent successfully!";
    }
}

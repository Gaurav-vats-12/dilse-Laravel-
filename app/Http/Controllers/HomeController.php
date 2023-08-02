<?php

namespace App\Http\Controllers;
use App\Models\Admin\Banner;
use App\Mail\ContactNotification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function Homepage(){
        $banner = Banner::where(['banner_type' => 'home'])->where('status','active')->get();
        return view('Home',compact('banner'));
    }

    public function contact(){
        return view('contact');
    }

    public function submitContactForm(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|max:255',
            'message' => 'required|string|max:1000',
        ]);

        // Process the form submission here

        // Send email notification
        $contactData = [
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'message' => $request->input('message'),
        ];

        //dd($contactData);
        Mail::to('shaurya.dograexoticait@gmail.com')->send(new ContactNotification($contactData));

        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }
}

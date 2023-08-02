<?php

namespace App\Http\Controllers;
use App\Models\Admin\Banner;
use App\Models\emailsubscription;
use App\Mail\ContactNotification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Newsletter;

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

    public function submitContactFormAjax(Request $request){
        $validator = \Validator::make($request->all(), [
            'first_name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'email' => 'required|email',
            'phone' => 'required|min:10|max:10',
            'message' => 'required|string|max:1000',
               ]);
        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()]);
        }
        $contactData = [
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'message' => $request->input('message'),
        ];
        Mail::to('shaurya.dograexoticait@gmail.com')->send(new ContactNotification($contactData));
        return response()->json(['code' => 200 ,  'status' =>'success', "message"=>"Thanks for being awesome! We have received your message and would like to thank you for writing to us. ..."]);
    }

    public function emailSubscription(Request $request){
        $validator = \Validator::make($request->all(), [
            'email_address' => 'required|email',
               ]);
        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()]);
        }
        if ( ! Newsletter::isSubscribed($request->email_address) )
        {
            Newsletter::subscribePending($request->email);
            return response()->json(['code' => 200 ,  'status' =>'success', "message"=>"Thanks For Subscribe"]);
            dd('jkkjkj');
        }
    }

    public function aboutus(){
        return view('about');
    }
    public function gallery(){
        return view('gallery');
    }
    public function giftcart(){
        return view('gift-cart');
    }
}

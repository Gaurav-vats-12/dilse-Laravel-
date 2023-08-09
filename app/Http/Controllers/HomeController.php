<?php

namespace App\Http\Controllers;
use App\Models\Admin\{Banner,Testimonial,Page,FoodItem,Gallery};

use App\Models\Subscriber;
use App\Mail\ContactNotification;
use App\Models\Booking;
use Illuminate\Support\Facades\Mail;

use App\Services\MailchimpService;
use Illuminate\Http\Request;
use Carbon\Carbon;


class HomeController extends Controller
{
    public function Homepage(){
        $banner = Banner::where(['banner_type' => 'home'])->where('status','active')->get();
        $FoodItem =FoodItem::where('featured',1)->where('status',1)->limit(3)->get();
        $Testimonial = Testimonial::where('status','active')->get();
        return view('Home',compact('banner','Testimonial','FoodItem'));
    }

    public function contact(){
        return view('Pages.contact');
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

        // $mailsub =  $mailchimp->subscribeToList($request->input('email_address'), config('services.mailchimp.list_key'));
        $getdata = Subscriber::where('email_address',$request->input('email_address'))->first();
        if($getdata){
            return response()->json(['code' => 200 ,  'status' =>'error', "message"=>"This email is already Subscribed"]);

        }else{
            $mailchimp = new MailchimpService();
            $mailchimp->subscribeToList($request->input('email_address'), config('services.mailchimp.list_key'));
            Subscriber::insertGetId(['email_address' => $request->email_address,'status' => 'subscribed','created_at' => now(),'updated_at' => now()]);
            return response()->json(['code' => 200 ,  'status' =>'success', "message"=>"Email Subscribe Successfully"]);
        }

    }

    public function aboutus(){
        return view('Pages.about');
    }
    public function gallery(){
        return view('Pages.gallery')->with('gallery',Gallery::where('status' ,1)->get());
    }

    public function giftCard(){
        return view('Pages.gift-card');
    }


    public function submitBookATable(Request $request){

        $request->validate([
            'name' => 'required|max:50',
        'email' => 'required|email',
        'date' => 'required',
        'time' => 'required',
        'phone' => 'required|min:10|max:10',
        'select_part' => 'required',
        ]);

        $bookingData = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'date' => Carbon::parse($request->input('date'))->format('Y-m-d'),
            'time' => $request->input('time'),
            'phone' => $request->input('phone'),
            'persons' => $request->input('select_part'),
            'comments' => $request->input('comments'),
        ];

        Booking::create($bookingData);
        //Mail::to('shaurya.dograexoticait@gmail.com')->send(new ContactNotification($contactData));
        return redirect()->back()->with('success', 'You booking requested has been sent! We will update you shortly');
    }


}

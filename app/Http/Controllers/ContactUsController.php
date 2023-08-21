<?php

namespace App\Http\Controllers;
use App\Http\Requests\ConntactUs\StoreContactUsAjaxRequest;
use App\Http\Requests\ConntactUs\StoreContactUsRequest as StoreContactUsRequestAlias;
use App\Http\Requests\ConntactUs\StoreEmailSubcriptionRequest;
use App\Mail\ContactNotification;
use App\Models\Subscriber;
use App\Services\MailchimpService;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{

    public function index(){
        return view('Pages.contact');

    }

    public function store(StoreContactUsRequestAlias $request){
        $contactData = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
        ];
        Mail::to(setting('site_email'))->send(new ContactNotification($contactData));
        return redirect()->back()->withToastSuccess('Your message has been sent successfully!');
    }
public function submitContactFormAjax(StoreContactUsAjaxRequest $request): \Illuminate\Http\JsonResponse
{
    $contactData = [
        'first_name' => $request->first_name,
        'last_name' => $request->last_name,
        'email' => $request->email,
        'phone' => $request->phone,
        'message' => $request->message,
    ];
    Mail::to(setting('site_email'))->send(new ContactNotification($contactData));
    return response()->json(['code' => 200 ,  'status' =>'success', "message"=>"Thanks for being awesome! We have received your message and would like to thank you for writing to us. ..."]);
}

public function emailSubscription(StoreEmailSubcriptionRequest $request): \Illuminate\Http\JsonResponse
{
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


}

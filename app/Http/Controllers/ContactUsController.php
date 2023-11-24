<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConntactUs\StoreContactUsAjaxRequest;
use App\Http\Requests\ConntactUs\StoreEmailSubcriptionRequest;
use App\Mail\ContactNotification;
use App\Models\Subscriber;
use App\Services\MailchimpService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Mail;

class ContactUsController extends Controller
{

  /**
   * @return View|\Illuminate\Foundation\Application|Factory|Application
   */
  public function index(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('Pages.contact');

    }

  /**
   * @param StoreContactUsAjaxRequest $request
   * @return JsonResponse
   */
  public function submitContactFormAjax(StoreContactUsAjaxRequest $request): JsonResponse
    {
        $contactData = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
        ];
        Mail::to(setting('site_email'))->send(new ContactNotification($contactData));
        return response()->json(['code' => 200, 'status' => 'success', "message" => "Thanks for being awesome! We have received your message and would like to thank you for writing to us. ..."]);
    }

  /**
   * @param StoreEmailSubcriptionRequest $request
   * @return JsonResponse
   */
  public function emailSubscription(StoreEmailSubcriptionRequest $request): JsonResponse
    {
        $getdata = Subscriber::where('email_address', $request->input('email_address'))->where('status', 'subscribed')->first();
        if ($getdata) {
            return response()->json(['code' => 200, 'status' => 'error', "message" => "This email is already Subscribed"]);
        } else {
            $mailchimp = new MailchimpService();
            $mail = $mailchimp->subscribeToList($request->input('email_address'), config('services.mailchimp.list_key'));
            if ($mail['status'] == 'success') {
                Subscriber::insertGetId(['email_address' => $request->email_address, 'status' => 'subscribed', 'created_at' => now(), 'updated_at' => now()]);
                return response()->json(['code' => 200, 'status' => 'success', "message" => "Email Subscribe Successfully"]);
            } else {
                return response()->json(['code' => 203, 'status' => 'error_message', "message" => 'This Email is not real email Please Enter the real email ']);
            }
        }
    }

}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use App\Services\MailchimpService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;

class EmailSubscriberController extends Controller
{
    /**
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function index(): View | Application | Factory | \Illuminate\Contracts\Foundation\Application
    {
        return view('admin.page.manage-subscribe.index', ['subscribers' => Subscriber::where('status', 'subscribed')->orderBy('id', 'DESC')->get()]);
    }

  /**
   * @param $id
   * @return RedirectResponse|void
   */
  public function unsubscribe_mail($id)
    {
        $mailchimp = new MailchimpService();
        $unsubscribed = $mailchimp->UnsubscribeToList(Subscriber::findOrFail($id)->email_address, config('services.mailchimp.list_key'));
        if ($unsubscribed['status'] == 'success') {
            Subscriber::findOrFail($id)->update([
                'status' => 'unsubscribed',
                'updated_at' => now(),
            ]);
            notyf()->duration(2000)->addSuccess('Email successfully Unsubscribe');
            return redirect()->route('admin.manage-subscribers.index');

        }
    }

}

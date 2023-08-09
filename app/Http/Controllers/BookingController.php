<?php

namespace App\Http\Controllers;
use Notification;
use App\Modules\Admins\Models\Admin;
use App\Notifications\BookingNotificationToAdmin;
use App\Http\Requests\Booking\StoreBookingTable;
use Illuminate\Support\Facades\Mail;
use App\Mail\BookingNotification;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function bookATable(){
        return view('Pages.book-table');
    }

    public function submitBookATable(StoreBookingTable $request){
        $bookingData = [
            'Full Name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'date' => $request->input('phone'),
            'time' => $request->input('time'),
            'select_part' => $request->input('select_part'),
            'comments' => $request->input('comments'),
        ];
        dd($bookingData );


        Notification::send(Admin::all(), new BookingNotificationToAdmin(['type' => 'New Booking','name' => Admin::first()->name, 'body' => 'A new booking has been made for '.$request->date.' at '.$request->time.'. The following information is available for the booking:
            .Name: '.$request->name.'
            .Email: '.$request->email.'
            .Phone number: '.$request->phone.'
            .Notes: '.$request->comments.'
            Please review the booking and let me know if you have any questions.
            ' , 'thanks' => 'Thank you', 'notification_url' => url('/admin/'),'notification_uuid' => \Str::random(10),'notification_date'=>date('Y-m-d H:i:s')]));


            dd('Notified');

        // dd($admin_notification);
        // Notification::send(Admin::all(), new SellerNotification());
        // dd($request->all());

    }

}

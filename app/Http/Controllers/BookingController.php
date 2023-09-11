<?php

namespace App\Http\Controllers;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;
use Notification;
use App\Modules\Admins\Models\Admin;
use App\Notifications\BookingNotificationToAdmin;
use App\Http\Requests\Booking\StoreBookingTable;
use Illuminate\Support\Facades\Mail;
use App\Models\Booking;
use Carbon\Carbon;
use App\Mail\BookingNotification;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function bookATable(){
        return view('Pages.book-table');
    }
    public function submitBookATable(StoreBookingTable $request){
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
        Mail::to($request->email)->send(new BookingNotification($bookingData));
        Notification::send(Admin::all(), new BookingNotificationToAdmin(['type' => 'New Booking','body' => 'A new booking has been made for '.$request->date.' at '.$request->time.'. The following information is available for the booking:.Name: '.$request->name.'.Email: '.$request->email.'.Phone number: '.$request->phone.'.Notes: '.$request->comments.' Please review the booking' , 'thanks' => 'Thank you', 'notification_url' => url('/admin/booking'),'notification_uuid' => Str::random(10),'notification_date'=>date('Y-m-d H:i:s')]));
        notyf()->duration(2000) ->addSuccess('You booking requested has been sent! We will update you shortly');
        return redirect()->back();
    }
    public function fetchBooking(Request $request): View|\Illuminate\Foundation\Application|Factory|JsonResponse|Application
    {
        return view(view: 'admin.page.booking.index')->with('booking', value: Booking::latest()->get());
    }


    public function updateStatus(Request $request)
    {
        $booking_email = Booking::findOrFail($request->booking_id)->email;


        dd('asdsadsa',$booking);
    }


}

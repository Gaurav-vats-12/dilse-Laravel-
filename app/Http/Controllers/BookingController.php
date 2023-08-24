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
        return redirect()->back()->withToastSuccess('You booking requested has been sent! We will update you shortly');
    }

    public function fetchBooking(Request $request): View|\Illuminate\Foundation\Application|Factory|JsonResponse|Application
    {
        if ($request->ajax()) {
            $draw = $request->get('draw');
            $start = $request->get("start");
            $rowperpage = $request->get("length"); // Rows display per page
            $columnIndex_arr = $request->get('order');
            $columnName_arr = $request->get('columns');
            $order_arr = $request->get('order');
            $search_arr = $request->get('search');
            $columnIndex = $columnIndex_arr[0]['column']; // Column index
            $columnName = $columnName_arr[$columnIndex]['data']; // Column name
            $columnSortOrder = $order_arr[0]['dir']; // asc or desc
            $searchValue = $search_arr['value']; // Search value
            // Total records
            $totalRecords = Booking::select('count(*) as allcount')->count();
            $totalRecordswithFilter = Booking::select('count(*) as allcount')->where('name', 'like', '%' .$searchValue . '%')->count();
            // Fetch records
            $records = Booking::orderBy($columnName,$columnSortOrder)
                ->where('bookings.name', 'like', '%' .$searchValue . '%')
                ->select('bookings.*')
                ->skip($start)
                ->take($rowperpage)
                ->get();
            $data_arr = array();
            foreach($records as  $key =>  $bookings){
                $data_arr[] = array(
                    "id" => $key + 1 ,
                    "name" =>$bookings->name,
                    "email" => $bookings->email,
                    "phone" => $bookings->phone,
                     "date"=>"".date("d M ,Y", strtotime($bookings->date))." (".$bookings->time.") ",
                    "persons" =>  $bookings->persons ,
                    "comments" =>  Str::limit(strip_tags($bookings->comments)) ,
                );
            }
            $response = array(
                "draw" => intval($draw),
                "iTotalRecords" => $totalRecords,
                "iTotalDisplayRecords" => $totalRecordswithFilter,
                "aaData" => $data_arr
            );

            return response()->json($response);

        }
        return view('admin.page.booking.index');
    }



}

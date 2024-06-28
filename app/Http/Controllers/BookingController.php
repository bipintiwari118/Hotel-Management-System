<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use App\Models\Booking;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books=Booking::all();
        return view('booking.index',compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers=Customer::all();
        return view('booking.create',compact('customers'));
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData= $request->validate([
            'customer_id' => 'required',
            'checkin' => 'required',
            'checkout' => 'required',
            'room_id' => 'required',
            'totals_adult' => 'required'
        ]);

        $data=new Booking;
        $data->customer_id = $validateData['customer_id'];
        $data->checkin_date = $validateData['checkin'];
        $data->checkout_date = $validateData['checkout'];
        $data->room_id = $validateData['room_id'];
        $data->total_adults = $validateData['totals_adult'];
        $data->total_children = $request->totals_Children;
        $data->save();
        if($request->ref=='front'){
            return redirect('/booking')->with('success',"Successfully room booking.");
        }
        return redirect('admin/booking/create')->with('success',"Successfully room booking.");

        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $books=Booking::find($id);
        $books->delete();
        return redirect('admin/booking')->with('delete','Booking details deleted successfully.');
    }
    public function avaliable_rooms(Request $request,$checkin_date){
        $arooms=DB::SELECT("SELECT * FROM rooms WHERE id NOT IN (SELECT room_id FROM bookings WHERE '$checkin_date' BETWEEN checkin_date AND checkout_date)");
        return response()->json(['data'=>$arooms]);
    }
    public function booking(){
        return view('front-end.booking');
    }


    }


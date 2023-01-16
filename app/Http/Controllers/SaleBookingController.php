<?php

namespace App\Http\Controllers;

use App\Models\employee\Employee;
use App\Models\SaleBooking;
use App\Models\SaleBookingDetail;
use App\Models\sales\Customer;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SaleBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $customers = Customer::where('branch_id',auth()->user()->branch_id)->get();
        $salesman = Employee::where('designation_id', '3')->where('branch_id', auth()->user()->branch_id)->get();
        if (count($request->all()) > 0) {
            if (isset($request->customer) && isset($request->salesman)){
                $booking = SaleBooking::whereBetween('sale_date',[$request->from_date,$request->to_date])
                    ->where('customer_id',$request->customer)
                    ->where('salesman_id',$request->salesman)
                    ->get();
                return view('pages.sale-booking.sale_booking_list',compact('customers','salesman','booking'));
            }
            if (isset($request->customer)){
                $booking = SaleBooking::whereBetween('sale_date',[$request->from_date,$request->to_date])
                    ->where('customer_id',$request->customer)
                    ->get();
                return view('pages.sale-booking.sale_booking_list',compact('customers','salesman','booking'));
            }
            if (isset($request->salesman)){
                $booking = SaleBooking::whereBetween('sale_date',[$request->from_date,$request->to_date])
                    ->where('salesman_id',$request->salesman)
                    ->get();
                return view('pages.sale-booking.sale_booking_list',compact('customers','salesman','booking'));
            }
            $booking = SaleBooking::whereBetween('sale_date',[$request->from_date,$request->to_date])->get();
            return view('pages.sale-booking.sale_booking_list',compact('customers','salesman','booking'));
        }else{
//            $customers = Customer::where('branch_id',auth()->user()->branch_id)->get();
//            $salesman = Employee::where('designation_id', '3')->where('branch_id', auth()->user()->branch_id)->get();
            return view('pages.sale-booking.sale_booking_list',compact('customers','salesman'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customer::where('branch_id',auth()->user()->branch_id)->get();
        return view('pages.sale-booking.sale_booking',compact('customers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(
            $request,
        [
           'customer' => 'required'
        ],
        [
            'customer.required' => 'Please select Customer.',
        ]);
//        dd($request->all());
        $booking = new SaleBooking();
        $booking->sale_date         = Carbon::now();
        $booking->invoice_no        = SaleBooking::maxId(auth()->user()->branch_id);
        $booking->branch_id       = auth()->user()->branch_id;
        $booking->customer_id       = $request->customer;
        $booking->salesman_id       = auth()->user()->id;
        $booking->created_by       = auth()->user()->id;
        $booking->save();
        $rows = $request->input('product_id');
        foreach ($rows as $key => $row) {
            $bookingDetails = new SaleBookingDetail();
            $bookingDetails->sale_booking_id    = $booking->id;
            $bookingDetails->product_id    = $request->product_id[$key];
            $bookingDetails->qty    = $request->qty[$key];
            $bookingDetails->save();
        }
        return back()->with('success', "Data Added Successfully!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SaleBooking  $saleBooking
     * @return \Illuminate\Http\Response
     */
    public function show(SaleBooking $saleBooking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SaleBooking  $saleBooking
     * @return \Illuminate\Http\Response
     */
    public function edit(SaleBooking $saleBooking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SaleBooking  $saleBooking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SaleBooking $saleBooking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SaleBooking  $saleBooking
     * @return \Illuminate\Http\Response
     */
    public function destroy(SaleBooking $saleBooking)
    {
        //
    }

    public function createInvoice($id)
    {
        $booking = SaleBooking::with('salesman','customer')->find($id);
        $bookingDetail = SaleBookingDetail::with('product','stock.latestbatch')->where('sale_booking_id',$id)->get();
//        return $bookingDetail;
        $delivery_man = Employee::where('reported_to',$booking->salesman_id)->get();

        return view('pages.sale.create_invoice',compact('booking','delivery_man','bookingDetail'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\SaleBooking;
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
    public function index()
    {
        $customers = Customer::where('branch_id',auth()->user()->branch_id)->get();
        return view('pages.sale-booking.sale_booking',compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
        $booking = new SaleBooking();
        $booking->sale_date         = Carbon::now();
        $booking->invoice_no        = SaleBooking::maxId(auth()->user()->branch_id);
        $booking->branch_id       = auth()->user()->branch_id;
        $booking->customer_id       = $request->customer;
        $booking->salesman_id       = auth()->user()->id;
        $booking->save();

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
}

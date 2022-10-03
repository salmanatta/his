<?php

namespace App\Http\Controllers;

use App\Models\CalendarImplement;
use App\Models\CalendarSetup;
use Illuminate\Http\Request;
use App\Models\GeneralBonus;
use App\Models\products\Product;
use App\Models\GeneralDiscount;
use App\Models\ProductDiscount;
use App\Models\ProductBonus;
use App\Models\Stock;
use Carbon\Carbon;

class GeneralController extends Controller
{

  public function defineRule()
  {
    // dd(auth()->user());
    $data['bonuses']    = GeneralBonus::where('branch_id', auth()->user()->branch_id)->get();
    $data['discounts']  = GeneralDiscount::where('branch_id', auth()->user()->branch_id)->get();
    return view('general-rule.define-rule', $data);
  }
  public function storeBonus(Request $request)
  {
    $this->validate(
      $request,
      [
        'bonus' => 'required',
        'quantity' => 'required',
        'start_date' => 'required',
        'end_date' => 'required',
      ],
      [
        'bonus.required'      =>    'Please enter Bonus.',
        'quantity.required'   =>    'Please enter Quantity.',
        'start_date.required' =>    'Please select Start Date.',
        'end_date.required'   =>    'Please select End Date.',
      ]
    );
    $generalBonus = new GeneralBonus;
    $generalBonus->bonus      = $request->bonus;
    $generalBonus->quantity   = $request->quantity;
    $generalBonus->start_date = $request->start_date;
    $generalBonus->end_date   = $request->end_date;
    $generalBonus->branch_id  = auth()->user()->branch_id;
    $generalBonus->save();
    return back()->with('success', "Data Added Successfully!");
  }

  public function generalBonus(Request $request)
  {
    if($request->bonus != '' && $request->quantity != '' && $request->start_date != '' && $request->end_date != ''){
      $generalBonus = new GeneralBonus();
      $generalBonus->bonus    = $request->bonus;
      $generalBonus->quantity    = $request->quantity;
      $generalBonus->start_date  = $request->start_date;
      $generalBonus->end_date    = $request->end_date;
      $generalBonus->branch_id   = auth()->user()->branch_id;
      $generalBonus->save();
    }
    $data = GeneralBonus::all()->toArray();
    return response()->json($data);
  }
  public function generalDiscount(Request $request)
  {
    if($request->discount != '' && $request->start_date != '' && $request->end_date != ''){
    $generalDiscount = new GeneralDiscount();
    $generalDiscount->discount    = $request->discount;
    $generalDiscount->start_date  = $request->start_date;
    $generalDiscount->end_date    = $request->end_date;
    $generalDiscount->branch_id   = auth()->user()->branch_id;
    $generalDiscount->save();
    }
    $data = GeneralDiscount::all()->toArray();
    return response()->json($data);
  }

  public function applyRule()
  {
    $bonuses    = GeneralBonus::getGeneralBonus()->get();
    $discounts  = GeneralDiscount::getGeneralDiscount()->get();
    $products   = Stock::with('product')->where('branch_id', auth()->user()->branch_id)->groupBy('product_id')->get();
    return view('general-rule.apply-rule', compact('bonuses', 'discounts', 'products'));
  }
  public function applyStore(Request $request)
  {
    $rows = $request->input('product_id');
    foreach ($rows as $key => $row) {
      if (!empty($request->bonus_id)) {
        ProductBonus::create([
          'bouns_id'      => $request->bonus_id,
          'product_id'    => $request->product_id[$key],
          'branch_id'     => auth()->user()->branch_id,
          'active_flag'   => 1,
        ]);
      }
      if (!empty($request->discount_id)) {
        ProductDiscount::create([
          'discount_id'   => $request->discount_id,
          'product_id'    => $request->product_id[$key],
          'branch_id'     => auth()->user()->branch_id,
          'active_flag'   => 1,
        ]);
      }
    }
    $data['bonuses']   = GeneralBonus::getGeneralBonus()->get();
    $data['discounts'] = GeneralDiscount::getGeneralDiscount()->get();
    $data['products']  = Stock::with('product')->where('branch_id', auth()->user()->branch_id)->groupBy('product_id')->get();
    return response()->json($data);
  }
  public function showGeneralBonus()
  {
    $data['bonuses']   = GeneralBonus::getGeneralBonus()->get();
    return response()->json($data);
  }
  public function showGeneralDiscount()
  {
    $data['discount']   = GeneralDiscount::getGeneralDiscount()->get();
    return response()->json($data);
  }
  public function insertProductBonus(Request $request)
  {
    if (!empty($request->bonus_id)) {
      ProductBonus::create([
        'bouns_id'      => $request->bonus_id,
        'product_id'    => $request->bonusProduct,
        'branch_id'     => auth()->user()->branch_id,
        'active_flag'   => 1,
      ]);
    }
    $productBonus = ProductBonus::with('bonuses')->where('product_id', $request->bonusProduct)->where('branch_id', auth()->user()->branch_id)->get();
    return $productBonus;
  }
  public function insertProductDiscount(Request $request)
  {
    if (!empty($request->discount_id)) {
      ProductDiscount::create([
        'discount_id'     => $request->discount_id,
        'product_id'      => $request->discountProduct,
        'branch_id'       => auth()->user()->branch_id,
        'active_flag'     => 1,
      ]);
    }
    $productDiscount = ProductDiscount::with('generalDiscount')->where('product_id', $request->discountProduct)->where('branch_id', auth()->user()->branch_id)->get();
    return $productDiscount;
  }
  public function calendarList()
  {
      $datePlan = CalendarSetup::all();
      return view('calendar.calendar-list',compact('datePlan'));
  }
  public function createDatePlan()
  {
      return view('calendar.calendar');
  }
  public function InsertDatePlan(Request $request)
  {
//      dd($request->all());
      CalendarSetup::create([
          'name' => $request->name,
          'min_days' => $request->min_days,
          'max_days' => $request->max_days,
      ]);
      return redirect('create-Date-Plan')->with('success', "Data Added Successfully!");
  }
  public function getCalendarSetup(Request $request)
  {
      $calendar = CalendarImplement::with('CalendarSetup')
                                    ->where('form_name',$request->transType)
                                    ->where('branch_id',auth()->user()->branch_id)
                                    ->first();
      return response()->json($calendar);
  }

}

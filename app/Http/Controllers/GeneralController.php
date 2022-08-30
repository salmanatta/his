<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GeneralBonus;
use App\Models\products\Product;
use App\Models\GeneralDiscount;
use App\Models\ProductDiscount;
use App\Models\ProductBonus;
use Carbon\Carbon;
class GeneralController extends Controller
{
   
public function defineRule()
    {
    	// dd(auth()->user());
    	$data['bonuses']=GeneralBonus::where('branch_id',auth()->user()->branch_id)->get();      
    	$data['discounts']=GeneralDiscount::where('branch_id',auth()->user()->branch_id)->get();      
    	return view('general-rule.define-rule',$data);
    }
    public function storeBonus(Request $request)
    {
      $this->validate($request, [
        'bonus'=>'required',
        'quantity'=>'required',
        'start_date'=>'required', 
        'end_date'=>'required', 
    ],
    [   
        'bonus.required'      =>    'Please enter Bonus.',
        'quantity.required'   =>    'Please enter Quantity.',
        'start_date.required' =>    'Please select Start Date.',
        'end_date.required'   =>    'Please select End Date.',
   ]);  
      $generalBonus = new GeneralBonus;
      $generalBonus->bonus      = $request->bonus;
      $generalBonus->quantity   = $request->quantity;
      $generalBonus->start_date = $request->start_date;
      $generalBonus->end_date   = $request->end_date;
      $generalBonus->branch_id  = auth()->user()->branch_id;
      $generalBonus->save();      
      return back()->with('success',"Data Added Successfully!");
    }

    public function generalBonus(Request $request)
    {      
      
      $data=GeneralBonus::create($request->all());
      // return back()->with('success',"Data Added Successfully!");
      $data=GeneralBonus::all()->toArray();        
       return response()->json($data);
 }
public function generalDiscount(Request $request)
    {
     $data=GeneralDiscount::create($request->all());
       $data=GeneralDiscount::all()->toArray();
      //  echo "<pre>";
      // print_r($data);
      // die();
       return response()->json($data);
}

public function applyRule()
    {
    	$data['bonuses']    = GeneralBonus::where('branch_id',auth()->user()->branch_id)->whereDate('end_date', '>=', Carbon::now())->get();
    	$data['products']   = Product::all();
    	$data['discounts']  = GeneralDiscount::where('branch_id',auth()->user()->branch_id)->get();
     return view('general-rule.apply-rule',$data);
    }
public function applyStore(Request $request)
    {
    	  //  echo "<pre>";
       // print_r($request->all());
       // die();
        $product_ids = $request->input('product_id');
        // $generalBonus=GeneralBonus::where('id',$request->bonus_id)->get()->makeHidden(['created_at','updated_at','id'])->toArray();
        $generalBonus=GeneralBonus::where('id',$request->bonus_id)->first(['bonus','quantity','start_date','end_date']);
     //      echo "<pre>";
     // print_r($generalBonus);
     //    die();

        $generalDiscount=GeneralDiscount::where('id',$request->discount_id)->first(['discount','start_date','end_date']);


       for ($i = 0; $i < count($product_ids); $i++) 
        {
            // for bonus
            $product_id   = $request->input('product_id')[$i];
            // $bonus        = $generalBonus->bonus[$i];
            // $quantity     = $generalBonus->quantity[$i];
            // $b_start_date = $generalBonus->start_date[$i];
            // $b_end_date   = $generalBonus->end_date[$i];
            // for disc
            // $discount        = $generalDiscount->discount[$i];
            // $d_start_date = $generalDiscount->start_date[$i];
            // $d_end_date   = $generalDiscount->end_date[$i];

         
                    if (!empty($generalBonus))
                     {
                       // $data= ProducBonus::where('id',$request->bonus_id)->updateOrCreate();
                      $data=ProductBonus::create([
                        'product_id'=>$product_id,
                        'bonus'     =>$generalBonus->bonus,
                        'quantity'  =>$generalBonus->quantity,
                        'start_date'=>$generalBonus->start_date,
                        'end_date'  =>$generalBonus->end_date,
                        'isActive'  =>1,
                      ]);

                    }
                     if (!empty($generalDiscount))
                      {
                        $data= ProductDiscount::create([
                        'product_id'=>$product_id,
                        'discount'     =>$generalDiscount->discount,
                        'start_date'     =>$generalDiscount->start_date,
                        'end_date'     =>$generalDiscount->end_date,
                        'isActive'     =>1,
                      ]);
                     } 
                        }

      // $data= ProducBonus::where('id',$request->bonus_id)->updateOrCreate([
      //   'product_id'     => $product_id,
      //       'bonus'      => $bonus,
      //       'quantity'   => $quantity,
      //       'start_date' => $start_date,
      //       'end_date'   => $end_date,
      //   ]);
      //  $data= ProducDiscount::where('id',$request->discount_id)->updateOrCreate([
      //   'product_id' => $product_id,
      //       'discount'   => $discount,
      //       'start_date' => $start_date,
      //       'end_date'   => $end_date,
      //   ]);
         

    	
           //  $data = ProducBonus::create([
           //  'product_id' => $product_id,
           //  'bonus'      => $bonus,
           //  'quantity'   => $quantity,
           //  'start_date' => $start_date,
           //  'end_date'   => $end_date,
           //    ]);
           // $data = ProducDiscount::create([
           //  'product_id' => $product_id,
           //  'discount'   => $discount,
           //  'start_date' => $start_date,
           //  'end_date'   => $end_date,
           //   ]);
              
         return response()->json($data);;
    }

   
}

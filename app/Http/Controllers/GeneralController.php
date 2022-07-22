<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GeneralBonus;
use App\Models\products\Product;
use App\Models\GeneralDiscount;
use App\Models\ProductDiscount;
use App\Models\ProductBonus;

class GeneralController extends Controller
{
   
public function defineRule()
    {
    	// dd('okk');
    	$data['bonuses']=GeneralBonus::all();
    	$data['discounts']=GeneralDiscount::all();
    	return view('general-rule.define-rule',$data);
    }

public function generalBonus(Request $request)
    {
     $data=GeneralBonus::create($request->all());
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
    	$data['bonuses']=GeneralBonus::all();
    	$data['products']=Product::all();
    	$data['discounts']=GeneralDiscount::all();
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

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Delivery;
use App\Models\selectDelivery;
use App\Models\Order;
use App\Models\Customer;
use App\Http\Requests\ChooseDeliveryRequest;
use DB;

class ChooseDelivery extends Controller
{
    public function index()
    {
        try{
            $deliveries = Delivery::expiretion()->get();
            $orders = Order::selection()->get();
            if(!$deliveries)
            return view('admin.delivery-order.index')->with(['error' => 'لا يوجد دليفريا حاليا.']);

            return view('admin.delivery-order.index', compact('deliveries', 'orders'));
        }catch(\Exception $ex)
        {
            return $ex;
            return redirect()->route('admin.choose-delivery')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

   

    public function update($id)
    {
        try{
            
            $delivery = Delivery::findOrFail($id);
                       
            if(!$delivery)
            return redirect()->route('admin.choose-delivery')->with(['error' => 'هذا الدليفري غير موجود حاليا.']);

            $status = $delivery->expire == 0 ? 1 : 0;
            $delivery->update(['expire' => $status]);

            
            return redirect()->route('admin.choose-delivery')->with(['success' => 'تم اختيار الدليفري بنجاح']);
            
        }catch(\Exception $ex)
        {
            return $ex;
            return redirect()->route('admin.choose-delivery')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }


    
    public function store(ChooseDeliveryRequest $request, Delivery $delivery)
    {
        try{
        //dd($request->order_id);
           DB::table('select_deliveries')->insert([
            'time'=>$request->time,
            'order_id'=>$request->order_id,
            'delivery_id'=>$delivery->id,
            'address'=>$request->address, 
           ]);    
            //$delivery->orders()->attach([$request->order_id,'time' => $request->time]);
        

            /* selectDelivery::create([
            'time'=>$request->time,
            'order_id'=>$request->order_id,
            'delivery_id'=>$delivery->id,
            'address'=>$request->address, 
            ]); */
            DB::table('deliveries')->where('id', $delivery->id)->update(['expire'=> 1]);
             
            return redirect()->route('admin.choose-delivery')->with(['success' => 'تم اختيار الدليفري بنجاح']);
            
        }catch(\Exception $ex)
        {
            return $ex;
            return redirect()->route('admin.choose-delivery')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }


    public function getCustomer(Request $request)
    {
      if($request->ajax())
      {
         $customer = Customer::with('orders')->where('id',$request->customer_id)->get();
      
         $data = view('admin.delivery-order.ajax',compact('customer'))->render();
        
         return response()->json(['options' => $data]);
      }
   
    }


}

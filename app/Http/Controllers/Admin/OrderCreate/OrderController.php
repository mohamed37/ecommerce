<?php

namespace App\Http\Controllers\Admin\OrderCreate;
use App\Models\Order;
use App\Models\Branch;
use App\Models\Customer;
use App\Models\Products;
use Illuminate\Http\Request;
use App\Events\VendorNotification;
use App\Notifications\OrderNotify;
use Illuminate\Support\Facades\DB;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\OrderProductRequest;
use Illuminate\Support\Facades\Notification;

class OrderController extends Controller
{

  
   public function create(Customer $customer)
   {
       try{
            
        $branches = Branch::with('products')->active()->get();
        $orders = $customer->orders()->with('products')->get();
       
       
        if($branches->count() <= 0)
        return redirect()->route('admin.order.create')->with(['error' => 'يجب تسجيل محل']);
        
        return view('admin.creation_order.create',compact('branches', 'orders', 'customer'));
       
        }catch(\Exception $ex)
       {
           return $ex;
           return redirect()->back()->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
       }
       
   }

   public function store(OrderProductRequest $request, Customer $customer)
   {
       try{        

            $order = $customer->orders()->create([]);
            $order->products()->attach($request->products);
            
            $total_price = 0;
            
        foreach($request->products as $id=>$quantity)
        {
            $product = Products::findOrFail($id);
            $total_price +=  $product->price * $quantity['quantity'];
        }

        $order->update([
            'total_price' => $total_price,
            'address' =>$request->address
        ]);     

        $data = $request->except('_token');
         Session::put('products', $data);
         Session::put('address', $request->address);
         Session::put('total_price', $total_price);



         //notifaction
        
	
         
        

        
        return redirect()->back()->with(['success' => 'تم الشراء بنجاح']);
       }catch(\Exception $ex)
       {
           return $ex;
           return redirect()->route('admin.customers')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
       }
    
     
   }
}

<?php

namespace App\Http\Controllers\customer\OrderCart;

use App\Models\Order;
use App\Models\Branch;
use App\Models\Customer;
use App\Models\Products;
use Illuminate\Http\Request;
use App\Notifications\OrderNotify;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\OrderProductRequest;
use Illuminate\Support\Facades\Notification;

class OrderController extends Controller
{
    public function create(Customer $customer)
   {
       try{
        if(Auth::guard('customer')->check())
        {
            $branches = Branch::with('products')->active()->get();
            $orders = $customer->orders()->with('products')->get();
          
            if($branches->count() <= 0)
            return redirect()->route('admin.order.create')->with(['error' => 'يجب تسجيل محل']);
            
            return view('front.cart',compact('branches', 'orders', 'customer'));

       }else{
           return redirect()->route('main')->with(['error' => 'errorrrrrrr']);
       }       
        }catch(\Exception $ex)
       {
           return $ex;
           return redirect()->back()->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
       }
       
   }

  /*  public function viewCart(Customer $customer)
   {
       $cart = 'لا يوجد مشتريات ';
       return view('front.cart', compact('cart'));
   } */
   /* public function addCart(Customer $customer,Request $request)
   {
       try{ 
           $data = $request->except('_token');
           Session::put('cart', $data);
           $cart = Session::get('cart');

           
           if($cart){
            return view('front.cart',compact('cart')); 
       
           }else{
                $cart = null;
                return view('front.cart',compact('cart'));
           } 
       }catch(\Exception $ex)
       {
           return $ex;
       }
   } */

   public function addCart(Customer $customer,Request $request)
   {
       try{ 
          //return $request;

           $data = $request->except('_token');
           Session::put('cart', $data);
           $cart = Session::get('cart');
           return view('front.products',compact('cart'));

       }catch(\Exception $ex)
       {
           return $ex;
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

        

        return redirect()->route('waiting')->with(['success' => 'تم الشراء بنجاح']);
       }catch(\Exception $ex)
       {
           return $ex;
           return redirect()->route('admin.customers')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
       }
    
     
   }

   public function destroy($id)
   {
       try{
            $order = Order::findOrFail($id)->delete();
            if(!$order)
             return redirect()->route('error');

            return view('front.home'); 
       }catch(\Exception $ex){
        return $ex;
       }
   }
}

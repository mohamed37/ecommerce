<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Customer;
use App\Http\Requests\OrderRequest;

class OrdersController extends Controller
{
    public function __construct()
    {
         $this->middleware('auth:admin');
    }
    
    public function index()
    {
        $orders = Order::selection()->paginate(PAGINATION_COUNT);
        return view('admin.orders.index',compact('orders'));
    }

    public function create()
    {
        try{
            $customers = Customer::active()->get();
            
            if(!$customers)
            return redirect()->route('admin.orders')->with(['error' => 'يحب تسجيل عميل اولا.']);

            return view('admin.orders.create',compact('customers'));

        }catch(\Exception $ex){
            return redirect()->route('admin.orders')->with(['erorr' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

    public function store(OrderRequest $request)
    {
        try{

            Order::create([
                'customer_id'=>$request->customer_id,
                'total_price' => $request->total_price,
                'address' => $request->address
            ]);
            
            return redirect()->route('admin.orders')->with(['success'=> 'تم الحفظ بنجاح.']);

        }catch(\Exception $ex)
        {
            return redirect()->route('admin.orders')->with(['erorr' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

    public function destroy($id)
    {
      try{
        $order = Order::findOrFail($id);
        if(!$order)
        return redirect()->route('admin.orders')->with(['erorr' => 'هذا الطلب غير متوفر الان.']);

        $order->delete();
        return redirect()->route('admin.orders')->with(['success'=> 'تم الحذف بنجاح.']);

     }catch(\Exception $ex)
     {
        return redirect()->route('admin.orders')->with(['erorr' => 'حدث خطا ما برجاء المحاوله لاحقا']);
     }
    }

    public function show($id)
    {
        try{
            $order = Order::with('products')->findOrFail($id);
            //return $order;
            return view('admin.orders.show', compact('order'));
        }catch(\Exception $ex)
        {
        return redirect()->route('admin.orders')->with(['erorr' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }
}

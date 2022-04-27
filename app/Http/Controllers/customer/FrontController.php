<?php

namespace App\Http\Controllers\customer;

use App\Models\Customer;
use App\Models\Products;
use App\Models\Branch;
use App\Models\MainCategory;
use DB;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CustomerRequest;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\frontRequests\customerLoginRequest;

class FrontController extends Controller
{
   
   public function getlogin()
   {
       return view('front.auth.login');
   }
   public function customerLogin(customerLoginRequest $request)
   {
          
       try{
           $remember_me = $request->has('remember_me') ? true : false;
           if (Auth::guard('customer')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")], $remember_me))
       {
           
           Session::put('email',$request->input('email'));
           //return redirect()->intended('/customer/home');
           return redirect()->route('main');
        }else{
            return redirect()->route('main')->with('البريد الالكتروني او كلمة المرور خطأ.');
        }
       }catch(\Exception $ex)
       {
           return $ex;
           return redirect()->route('main')->with(['error' => 'يوجد مشكلة ما.']);
       }
   }

   public function customerRegister(CustomerRequest $request)
   {
       
        try{

            if(!$request->has('active'))
            {
                 $request->request->add(['active' => 0]);
            }else{
                 $request->request->add(['active' => 1]);
            }

            $filepath ='';
            if($request->has('logo'))
            {
              $filepath = uploadImage('customers', $request->logo);
            }
           // return $request;
         $customer = Customer::create([
                    'name' => $request->name,
                    'mobile' => $request->mobile,
                    'phone' => $request->phone,
                    'email'=> $request->email,
                    'password' => $request->password,
                    'active' => $request->active,
                    'address' => $request->address,
                    'logo' => $filepath,
                    'latitude' => $request->latitude,
                    'longitude' => $request->longitude,
                    
            ]);

            return redirect()->route('main')->with(['success' => 'تم الحفظ بنجاح.']);
            
        }catch(\Exception $ex)
        {
            return $ex;
            return redirect()->route('main')->with(['error' => 'خطاء ما يرجي المحاولة لاحقا.']);
        }

   }

   public function customerLogout()
   {
       try{
           /* 
           $token = request()->user()->token();
             $token->revoke();
           */
           Auth::logout();
           Session::flush();
           return back(); 
       }catch(\Exception $ex)
       {
           return $ex;
           return redirect()->route('main')->with(['error' => 'يوجد مشكلة ما.']);
       }
              
   }

   //*********************************************************** */
   
   public function shop()
   {
       try{
            if(Auth::guard('customer')->check())
            {
                $branches = Branch::with('products')->selection()->active()->get();
               
                return view('front.shop',compact('branches'));
                

            }else{
                return redirect()->route('main');
            }
        
       }catch(\Exception $ex)
       {
        return $ex;
        return redirect()->route('main')->with(['error' => 'يوجد مشكلة ما.']); 
       }
   }

   public function category($id)
   {
       try{
            if(Auth::guard('customer')->check())
            {
                $category = MainCategory::with('subcategories')->findOrFail($id);
                return view('front.subcategory',compact('category'));

            }else{
                return redirect()->back();
            }
        
       }catch(\Exception $ex)
       {
        return $ex;
        return redirect()->route('main')->with(['error' => 'يوجد مشكلة ما.']); 
       }
   }

   public function showProduct($id)
   {
       try{
        if(Auth::guard('customer')->check())
        {
           $product = Products::findOrFail($id);
           
           $products = Products::where('branch_id', $product->branch_id)->get();
           return view('front.product',compact('product', 'products'));
        }
       }catch(\Exception $ex)
       {
        return $ex;
        return redirect()->route('main')->with(['error' => 'يوجد مشكلة ما.']);   
       }
   }

   
   public function Products($id)
   {
       try{

           $branch = Branch::findOrFail($id);
           $products = Products::where('branch_id', $id)->get();  
           
           if(!$products)
            return redirect()->route('error');

            return view('front.products',compact('products', 'branch'));

       }catch(\Exception $ex)
       {
           return $ex;
           return back();
       }
   }

   public function getProduct()
   {
       try{
           $products = Products::selection()->active()->get();

           if(!$products)
            return redirect()->route('error');

            return redirect()->route('main')->with(['products', $products]);
       }catch(\Exception $ex)
       {
           return $ex;
           return back();
       }
   }
}

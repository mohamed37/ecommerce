<?php

namespace App\Http\Controllers\Admin;

use App\Models\Customer;
use Illuminate\Support\Str;
use App\Models\MainCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest;

class CustomerController extends Controller
{
    public function index()
   {
       $customers = Customer::selection()->paginate(PAGINATION_COUNT);

       return view('admin.customers.index',compact('customers'));
   }

   public function create()
   {
       try{
        
        return view('admin.customers.create');
       
    }catch(\Exception $ex)
       {
         
        return redirect()->route('admin.customers')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
       }
   }


   public function store(CustomerRequest $request)
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
                    'email'=> $request->email,
                    'password' => $request->password,
                    'active' => $request->active,
                    'address' => $request->address,
                    'logo' => $filepath,
                    'latitude' => $request->latitude,
                    'longitude' => $request->longitude,
                    'phone' => $request->phone
            ]);

            return redirect()->route('admin.customers')->with(['success' => 'تم الحفظ بنجاح.']);
            
        }catch(\Exception $ex)
        {
            return $ex;
            return redirect()->route('admin.customers')->with(['error' => 'خطاء ما يرجي المحاولة لاحقا.']);
        }

   }

   public function edit($id)
   {
     try { 

        $customer = Customer::selection()->findOrFail($id);
        if (!$customer)
            return redirect()->route('admin.customers')->with(['error' => 'هذا المتجر غير موجود او ربما يكون محذوفا ']);

        return view('admin.customers.edit', compact('customer'));
       
        
     } catch (\Exception $ex) {
         return $ex;
        return redirect()->route('admin.customers')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
     }  
   }

   public function update($id, CustomerRequest $request)
   {
    

    try{  
        $customer = Customer::findOrFail($id);
        if (!$customer)
            return redirect()->route('admin.customers')->with(['error' => 'هذا المتجر غير موجود او ربما يكون محذوفا ']);
   


        DB::beginTransaction();
        // save image
        $data= $request->except('_token','id', 'logo', 'password');
        
        if ($request->has('logo')) 
        {
            $filePath = uploadImage('customers', $request->logo);

           MainCategory::where('id', $id)
                ->update([
                    'logo' => $filePath,
                ]); 

                $image = Str::after($customer->photo, 'assets/');
                $image = base_path('assets/' . $image);
                unlink($image);
        }


        if(request()->has('password') && request()->get('password') != '')
          {  
            $data['password'] = $request->password;
          }

         if (!$request->has('active'))
              $request->request->add(['active' => 0]);
             else
               $request->request->add(['active' => 1]); 
        
        
               Customer::where('id', $id)->update($data);
        DB::commit();
         
        return redirect()->route('admin.customers')->with(['success' => 'تم التحديث  بنجاح.']);
    
      }catch(\Exception $ex){
       DB::rollback();
        return redirect()->route('admin.customers')->with(['error' => 'هناك خطاء برجي المحاولة فيما بعد.']);

      }
    }

   public function destroy($id)
   {
    try{
        $customer = Customer::findOrFail($id);

        if(!$customer)
        return redirect()->route('admin.customers')->with(['error'=> 'هذا القسم غير موجود.']);
       
        // categories have customers, so they cannot be deleted before making sure that they are empty  of customers
        $image = Str::after($customer->logo, 'assets/');
        $image = base_path('assets/' . $image);
        unlink($image);
        
        $customer->delete();
        
        return redirect()->route('admin.customers')->with(['success' => ' تم حذف القسم بنجاح.']); 
        
    }catch(\Exception $ex)
    {
        return redirect()->route('admin.customers')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);

    }
   }
   
   public function changeStatus($id)
    {
        try{

            $customer = Customer::findOrFail($id);
            if(!$customer)
            return redirect()->route('admin.customers')->with(['error'=> 'هذا القسم غير موجود.']);
            
            $status = $customer->active == 0 ? 1 : 0;

            $customer->update(['active' => $status]);

            return redirect()->route('admin.customers')->with(['success' => 'تم تغيير حالة القسم بنجاح.']); 

        }catch(\Exception $ex)
        {
            return redirect()->route('admin.customers')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);

        }
    }
}

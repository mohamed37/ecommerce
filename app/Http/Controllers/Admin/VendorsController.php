<?php

namespace App\Http\Controllers\Admin;

use App\Models\Branch;
use App\Models\Vendor;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use App\Models\MainCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Notifications\VendorCreated;
use App\Http\Requests\VendorsRequest;
use Illuminate\Support\Facades\Notification;

class VendorsController extends Controller
{
  public function __construct()
    {
         $this->middleware('auth:admin');
    }
    
   public function index(Request $request)
   {
        if($request->has('sort'))
       { 
            $vendors = Vendor::selection()->orderBy('id',$request->sort)->get();
            return view('admin.vendors.index',compact('vendors'));
        }elseif($request->has('number'))
        {
            $vendors = Vendor::selection()->paginate($request->number);
            return view('admin.vendors.index',compact('vendors'));
        }elseif($request->has('fillter'))
        { 
            $vendors = Vendor::where('category_id',$request->fillter)->get();
            return view('admin.vendors.index',compact('vendors'));
            
        }else {  
            $vendors = Vendor::selection()->paginate(PAGINATION_COUNT);
            return view('admin.vendors.index',compact('vendors'));
       }  
   }

   public function fillter(Request $request)
    {
        if($request->has('fillter'))
        { 
            $categories = MainCategory::get();
            $vendors = Vendor::where('category_id',$request->fillter)->get();
            return view('admin.vendors.index',compact('vendors'));
         }else {  
             $vendors = Vendor::selection()->paginate(PAGINATION_COUNT);
             return view('admin.vendors.index',compact('vendors'));
        }  
    }
   public function search(Request $request)
   { 
       if($request->ajax())
       { 
           $vendors = Vendor::when($request->search, function($query) use($request) {
               return $query->where('name', 'Like','%'. $request->search . '%')
                     ->orwhere('address', 'Like','%'. $request->search . '%');
            })->get();
               
              $data = view('admin.vendors.rows', compact('vendors'))->render();
              return response()->json($data);
       } else {
               
               return view('admin.vendors.create', compact('vendors'));
       }   
               
   }
   public function create()
   {
       try{
       $categories = MainCategory::active()->get();
       $subcategories = SubCategory::active()->get();
     
       if( $categories->count() <= 0 || $subcategories->count() <= 0)
       {
        return redirect()->route('admin.vendors')->with(['error' => ' يجب تسجيل قسم رئيسي و قسم فرعي.']);

       }else{
        return view('admin.vendors.create',compact('categories','subcategories'));
       }
    }catch(\Exception $ex)
       {
           return $ex; 
        return redirect()->route('admin.vendors')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
       }
   }

   public function store(VendorsRequest $request)
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
              $filepath = uploadImage('vendors', $request->logo);
            }
           // return $request;
         $vendor = Vendor::create([
                    'name' => $request->name,
                    'mobile' => $request->mobile,
                    'email'=> $request->email,
                    'password' => $request->password,
                    'active' => $request->active,
                    'address' => $request->address,
                    'logo' => $filepath,
                    'latitude' => $request->latitude,
                    'longitude' => $request->longitude,
                    'category_id' => $request->category_id,
                    'subcat' => $request->subcat
            ]);

           // Notification::send($vendor,new VendorCreated());
            return redirect()->route('admin.vendors')->with(['success' => 'تم الحفظ بنجاح.']);
            
        }catch(\Exception $ex)
        {
            return $ex;
            return redirect()->route('admin.vendors')->with(['error' => 'خطاء ما يرجي المحاولة لاحقا.']);
        }

   }

   public function edit($id)
   {
     try { 

        $vendor = Vendor::selection()->findOrFail($id);
        if (!$vendor)
            return redirect()->route('admin.vendors')->with(['error' => 'هذا المتجر غير موجود او ربما يكون محذوفا ']);

        $categories = MainCategory::active()->get();

        if( $categories->count() <= 0)
       {
        return redirect()->route('admin.vendors')->with(['error' => 'يجب تسجيل قسم رئيسي.']);

       }else{
        return view('admin.vendors.edit', compact('vendor', 'categories'));
       }
        
     } catch (\Exception $exception) {
        return redirect()->route('admin.vendors')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
     }  
   }

   public function update($id, VendorsRequest $request)
   {
    
    try{  
        $vendor = Vendor::findOrFail($id);
        if (!$vendor)
            return redirect()->route('admin.vendors')->with(['error' => 'هذا المتجر غير موجود او ربما يكون محذوفا ']);
        DB::beginTransaction();
        // save image
        $data= $request->except('_token','id', 'logo', 'password' , 'subcat', 'category_id');
       
        if ($request->has('logo')) 
        {
            $filePath = uploadImage('vendors', $request->logo);

           MainCategory::where('id', $id)
                ->update([
                    'logo' => $filePath,
                ]); 

                $image = Str::after($vendor->photo, 'assets/');
                $image = base_path('assets/' . $image);
                unlink($image);
        }


        if(request()->has('password') && request()->get('password') != '')
          {  
            $data['password'] = $request->password;
          }

         if (!$request->has('active'))
         {
          $request->request->add(['active' => 0]);
         }else{
          $request->request->add(['active' => 1]); 
         }
        
        
               Vendor::where('id', $id)->update($data);
        DB::commit();
       // return $request;
        return redirect()->route('admin.vendors')->with(['success' => 'تم التحديث  بنجاح.']);
    
      }catch(\Exception $ex){
       
        DB::rollback();
        
        return redirect()->route('admin.vendors')->with(['error' => 'هناك خطاء برجي المحاولة فيما بعد.']);

      }
    }

   public function destroy($id)
   {
    try{
        $vendor = Vendor::findOrFail($id);
        $branch = Branch::where('vendor_id', $id)->pluck('id');

        if($branch)
        return redirect()->route('admin.vendors')->with(['error' => '  لا يمكن حذف التاجر قبل حذف الفروع الخاصة به.']); 


        if(!$vendor)
        return redirect()->route('admin.vendors')->with(['error'=> 'هذا القسم غير موجود.']);
        // categories have vendors, so they cannot be deleted before making sure that they are empty  of vendors

        $image = Str::after($vendor->logo, 'assets/');
        $image = base_path('assets/' . $image);
        
        unlink($image);
        
        $vendor->delete();
        
        return redirect()->route('admin.vendors')->with(['success' => ' تم حذف القسم بنجاح.']); 
        
    }catch(\Exception $ex)
    {
        return redirect()->route('admin.vendors')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);

    }
   }
   
   public function changeStatus($id)
    {
        try{

            $vendor = Vendor::findOrFail($id);
            if(!$vendor)
            return redirect()->route('admin.vendors')->with(['error'=> 'هذا القسم غير موجود.']);
            
            $status = $vendor->active == 0 ? 1 : 0;

            $vendor->update(['active' => $status]);

            return redirect()->route('admin.vendors')->with(['success' => 'تم تغيير حالة القسم بنجاح.']); 

        }catch(\Exception $ex)
        {
            return redirect()->route('admin.vendors')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);

        }
    }

    public function getSubCat(Request $request)
    {
        
      if($request->ajax())
      {
        
         $subcat = SubCategory::where('category_id', $request->category_id )->active()->get();
         
         $data = view('admin.vendors.ajax',compact('subcat'))->render();
        
         return response()->json(['options' => $data]);
      }
   
    }

}

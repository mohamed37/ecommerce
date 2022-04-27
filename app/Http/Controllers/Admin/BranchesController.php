<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Branch;
use App\Models\Vendor;
use App\Models\Products;
use App\Http\Requests\BranchesRequest;
use Illuminate\Support\Str;

class BranchesController extends Controller
{
    public function __construct()
    {
         $this->middleware('auth:admin');
    }
    
    public function index()
    {
        try{
            $branches = Branch::selection()->paginate(PAGINATION_COUNT);
            if(!$branches)
            
            return redirect()->route('admin.branches')->with(['error' => 'لم يتم تسجيل حتي الان']);     
             
            return view('admin.branches.index',compact('branches'));     
    }catch(\Exception $ex)
     {
        return redirect()->route('admin.branches')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
     }
    }

    public function create()
    {
        try{
            $vendors = Vendor::active()->get();
            //return $vendors->count();
            if($vendors->count() <= 0)
            {
                return redirect()->route('admin.branches')->with(['error'=> 'يجب تسجيل تاجر .']);
            }else{
                return view('admin.branches.create',compact('vendors'));

            }
    
         }catch(\Exception $ex)
        {
        return redirect()->route('admin.branches')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        } 
       
    }

    public function store(BranchesRequest $request)
    {
        try{

            if($request->has('active'))
            {
                $request->request->add(['active' => 1]);
            }else{
                $request->request->add(['active' => 0]);

            }
           

            $filePath = "";
            if($request->has('photo'))
              $filePath = uploadImage('branches', $request->photo);


             Branch::create([
                'name' => $request->name,
                'vendor_id' => $request->vendor_id,
                'phone' => $request->phone,
                'photo' => $filePath,
                'active' => $request->active,
                'location' => $request->location
            
            ]);

            
           
            return redirect()->route('admin.branches')->with(['success' => 'تم الحفظ بنجاح.']);
        }catch(\Exception $ex)
        {
            
        return redirect()->route('admin.vendors')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);

        }
    }
    public function destroy($id)
    {
        try{
            $branch = Branch::findOrFail($id);
            $products = Products::where('branch_id', $id)->pluck('id');
            if($products)
            return redirect()->route('admin.vendors')->with(['error' => '  لا يمكن حذف التاجر قبل حذف المنتجات الخاصة به.']); 
    
            if(!$branch)
            return redirect()->route('admin.branches')->with(['error'=> 'هذا الفرع غير موجود.']);
            // categories have vendors, so they cannot be deleted before making sure that they are empty  of vendors
    
            $image = Str::after($branch->photo, 'assets/');
            $image = base_path('assets/' . $image);
            unlink($image);
            
            $branch->delete();
            
            return redirect()->route('admin.branches')->with(['success' => ' تم حذف الفرع بنجاح.']); 
        }catch(\Exception $ex)
        {
            return $ex;
        return redirect()->route('admin.branches')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);

        }
    }

    public function changeStatus($id)
    {
        try{
            $branch = Branch::findOrFail($id);
                
                if(!$branch)
                return redirect()->route('admin.branches')->with(['error'=> 'هذا القسم غير موجود.']);
                
                $status = $branch->active == 0 ? 1 : 0;
    
                $branch->update(['active' => $status]);

                return redirect()->route('admin.branches')->with(['success' => 'تم تغيير الحالة بنجاح.']);

        }catch(\Exception $ex)
        {
        return redirect()->route('admin.vendors')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);

        }
    }
}

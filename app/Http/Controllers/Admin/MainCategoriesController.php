<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\SubCategory;    
use App\Models\MainCategory;    
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\MainCategoriesRequest;


class MainCategoriesController extends Controller
{

    public function __construct()
    {
         $this->middleware('auth:admin');
    }
    
    public function index()
    {
       $categories = MainCategory::selection()->get();
        return view('admin.maincategories.index',compact('categories'));
    }

    public function show($id)
    {
        try{
            $maincategory = MainCategory::findOrFail($id);
            if(!$maincategory)
            return back()->with(['error' => 'هذا القسم غير موجود حاليا']);

            return view('admin.maincategories.show', compact('maincategory'));

        }catch(\Exception $ex)
        {
            return $ex;
         return redirect()->route('admin.maincategories')->with(['erorr' => 'هناك خطاء برجي المحاولة فيما بعد.']);
        }
    }

    public function create()
    {
        return view('admin.maincategories.create');
    }


    public function store(MainCategoriesRequest $request)
    {
        try
        { 
         
         if(!$request->has('active'))
         $request->request->add(['active' => 0]);
        else 
         $request->request->add(['active' => 1]);
         
         $filePath = "";
         if($request->has('photo'))
           $filePath = uploadImage('maincategories', $request->photo);
         
         $mincategory = MainCategory::create([
            'name' => $request->name,
            'active' => $request->active,
            'slug' => $request->name,
            'photo' => $filePath
         ]);

         return redirect()->route('admin.maincategories')->with(['success' => 'تم الحفظ بنجاح.']);
     
       }catch(\Exception $ex){
            
         return redirect()->route('admin.maincategories')->with(['erorr' => 'هناك خطاء برجي المحاولة فيما بعد.']);
 
     }
 
    }

    public function edit($main_category_id)
    {
        $maincategory = MainCategory::findOrFail($main_category_id);

        if(!$maincategory)
        {
            return redirect()->route('admin.maincategories')->with(['erorr'=> 'هذا القسم غير موجود.']);
        }



        return view('admin.maincategories.edit',compact('maincategory'));
    }


    public function update(MainCategoriesRequest $request, $maincat_id )
    {
        try{
        
        $maincateory = MainCategory::findOrFail($maincat_id);

         if(!$maincateory)
        {
            return redirect()->route('admin.maincategories')->with(['erorr'=> 'هذا القسم غير موجود.']);
        }

        DB::beginTransaction();
        if(!$request->has('active'))
         $request->request->add(['active' => 0]);
         else
         $request->request->add(['active' => 1]);
        
         // save image
         if ($request->has('photo') ) {
        
            $filePath = uploadImage('maincategories', $request->photo);
            MainCategory::where('id', $maincat_id)
                ->update([
                    'photo' => $filePath,
                ]);
    
                $image = Str::after($maincateory->photo, 'assets/');
                $image = base_path('assets/' . $image);
                unlink($image);
                
            }
            MainCategory::where('id', $maincat_id)->update([
                'name' => $request->name,
                'slug' => $request->name,
                'active' => $request->active,
                

        ]);
      
       DB::commit();
        return redirect()->route('admin.maincategories')->with(['success' => 'تم تحديث القسم بنجاح']); 
        }catch(\Exception $ex)
        {
            DB::rollback();       
            return redirect()->route('admin.maincategories')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }



    }
      
    public function destroy($id)
    {
        try{
           // $classroom = ClassRoom::where('grade_id', $request->id)->pluck('grade_id'); 

            $maincat_id = MainCategory::findOrFail($id);
            $subcat= SubCategory::where('category_id', $id)->pluck('id');
            $vendors = $maincat_id->vendors();

            if(!$maincat_id)
            return redirect()->route('admin.maincategories')->with(['error'=> 'هذا القسم غير موجود.']);
            // categories have vendors, so they cannot be deleted before making sure that they are empty  of vendors

            if($subcat)
            return redirect()->route('admin.maincategories')->with(['error' => '  لا يمكن حذف القسم قبل حذف الاقسام الخاصة به.']); 
 
            
            if(isset($vendors) && $vendors->count() > 0)
            return redirect()->route('admin.maincategories')->with(['error' => 'لا يمكن حذف القسم قبل حذف التجار الخاص به.']); 
            
            else
            $image = Str::after($maincat_id->photo, 'assets/');
            $image = base_path('assets/' . $image);
            unlink($image);

             $maincat_id->delete();
            
            return redirect()->route('admin.maincategories')->with(['success' => ' تم حذف القسم بنجاح.']); 
            //************************************************************** */
        }catch(\Exception $ex)
        {
            return redirect()->route('admin.maincategories')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);

        }
    }

    public function changeStatus($id)
    {
        try{

            $maincat_id = MainCategory::findOrFail($id);
            if(!$maincat_id)
            return redirect()->route('admin.maincategories')->with(['error'=> 'هذا القسم غير موجود.']);
            
            $status = $maincat_id->active == 0 ? 1 : 0;

            $maincat_id->update(['active' => $status]);

            return redirect()->route('admin.maincategories')->with(['success' => 'تم تغيير حالة القسم بنجاح.']); 

        }catch(\Exception $ex)
        {
            return redirect()->route('admin.maincategories')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);

        }
    }
}



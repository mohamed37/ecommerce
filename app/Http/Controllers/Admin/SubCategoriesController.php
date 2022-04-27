<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\MainCategory;
use App\Http\Requests\SubCategoriesRequest;


class SubCategoriesController extends Controller
{
    public function index()
    {
        $subcategories = SubCategory::selection()->paginate(PAGINATION_COUNT);
        return view('admin.subcategories.index',compact('subcategories'));
    }

    public function search(Request $request)
    {
        try{
            $subcategories = SubCategory::when($request->search, function($query) use($request){
                $query->where('like' , '%' . $request->search . '%');
            });

            return view('admin.subcategories.index', compact('subcategories'));

        }catch(\Exception $ex)
        {
            return $ex;
            return redirect()->route('admin.sub_categories')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }
    public function create()
    {
        try{
            $maincategory = MainCategory::active()->get();
            /**->where([ [''id','category_id'], ['translation_of',0], ]); */
            if($maincategory->count() <= 0){
                return redirect()->route('admin.vendors')->with(['error' => 'يجب تسجيل قسم رئيسي.']);
            }else{
              return view('admin.subcategories.create',compact('maincategory'));
            }
        }catch(\Exception $ex)
        {
            return $ex;
            return redirect()->route('admin.sub_categories')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
            
        }

    }

    public function store(SubCategoriesRequest $request)
    {
        try{

            if(!$request->has('active') )
            {
                $request-> request->add(['active' => 0]);
            }else{
                $request-> request->add(['active' => 1]);
            }
            $filebase = "";
            if($request->has('photo'))
             {
             $filebase = uploadImage('subcategories', $request->photo);
             }
             SubCategory::create([
                'category_id' => $request->category_id,
                'name' => $request->name,
                'slug' => $request->name,
                'photo' => $filebase,
                'active' => $request->active
            ]);

            return redirect()->route('admin.sub_categories')->with(['success' => 'تم الحفظ بنجاح.']);

        }catch(\Exception $ex)
        {
            return $ex;
            return redirect()->route('admin.sub_categories')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

    public function destroy($id)
    {
        try{
            SubCategory::findOrFail($id)->delete();
            return redirect()->route('admin.sub_categories')->with(['error'=> 'تم الحذف بنجاح.']);
 
        }catch(\Exception $ex)
        {
            return redirect()->route('admin.sub_categories')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }     
    }

    public function changeStatus($id)
    {
        try{

            $subcategory = SubCategory::findOrFail($id);
            if(!$subcategory)
            return redirect()->route('admin.sub_categories')->with(['error'=> 'هذا القسم غير موجود.']);
            
            $status = $subcategory->active == 0 ? 1 : 0;

            $subcategory->update(['active' => $status]);

            return redirect()->route('admin.sub_categories')->with(['success' => 'تم تغيير حالة القسم بنجاح.']); 

        }catch(\Exception $ex)
        {
            return redirect()->route('admin.sub_categories')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);

        }
    }
}

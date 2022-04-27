<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Branch;
use App\Http\Requests\ProductsRequest;

class ProductsController extends Controller
{

    public function index()
    {
        try{

            $products = Products::selection()->paginate(PAGINATION_COUNT);

            return view('admin.products.index',compact('products'));

        }catch(\Exception $ex)
        {
         return redirect()->route('admin.products')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
       
    }

    public function create()
    {
        try{

            $branches = Branch::active()->get();
            if(!$branches)
             return redirect()->route('admin.products')->with(['error' => ' يجب تسجيل فرع.']);

             return view('admin.products.create',compact('branches'));
        }catch(\Exception $ex)
        {
         return redirect()->route('admin.products')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

    public function store(ProductsRequest $request)
    {
        try{
            
            if($request->has('active'))
            {
                $request->request->add(['active' => 1]);
            }else{
                $request->request->add(['active' => 0]);
            }

            $filepath= '';
            if($request->has('photo'))
            {
                $filepath = uploadImage('products', $request->photo);
            }

            $product = Products::create([
                'name' => $request->name,
                'photo' => $filepath,
                'price' => $request->price,
                'branch_id' => $request->branch_id,
                'description' => $request->description
            ]);
            return redirect()->route('admin.products')->with(['success' => 'تم الحفظ بنجاح.']);
        }catch(\Exception $ex)
        {
         return redirect()->route('admin.products')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

    public function edit($id)
    {
        try{
            $product = Products::findOrFail($id);
            if(!$product)
             return redirect()->route('admin.products')->with(['error' => 'هذا المنتج غير موجود. ']);
        }catch(\Exception $ex)
        {
         return redirect()->route('admin.products')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }
  
}

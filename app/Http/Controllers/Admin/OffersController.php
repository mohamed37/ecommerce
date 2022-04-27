<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Offers;
use App\Http\Requests\OffersRequest;

class OffersController extends Controller
{
    public function __construct()
    {
         $this->middleware('auth:admin');
    }
    
    public function index()
    {
        $offers = Offers::selection()->paginate(PAGINATION_COUNT);
        return view('admin.offers.index',compact('offers'));
    }

    public function create()
    {
        return view('admin.offers.create');
    }

    public function store(OffersRequest $request)
    {
        try{

            if($request->has('active'))
            {
                $request->request->add(['active' => 1]);
            }else{
                $request->request->add(['active' => 0]);
            }

            Offers::create([
                'name'=>$request->name,
                'discount' => $request->discount,
                'active' => $request->active
            ]);

            return redirect()->route('admin.offers')->with(['success'=> 'تم الحفظ بنجاح.']);

        }catch(\Exception $ex)
        {
            return redirect()->route('admin.offers')->with(['erorr' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

    public function destroy($id)
    {
      try{
        $offer = Offers::findOrFail($id);
        if(!$offer)
        return redirect()->route('admin.offers')->with(['erorr' => 'هذا العرض غير متوفر الان.']);

        $offer->delete();
        return redirect()->route('admin.offers')->with(['success'=> 'تم الحذف بنجاح.']);

     }catch(\Exception $ex)
     {
        return redirect()->route('admin.offers')->with(['erorr' => 'حدث خطا ما برجاء المحاوله لاحقا']);
     }
    }

    public function changeStatus($id)
    {
        try{
            $offer = Offers::findOrFail($id);
            if(!$offer)
            return redirect()->route('admin.offers')->with(['erorr' => 'هذا العرض غير متوفر الان.']);
    
            $status = $offer->active == 0 ? 1 : 0;
            $offer->update(['active' => $status]);
            
            return redirect()->route('admin.offers')->with(['success'=> 'تم تغيير الحالة بنجاح.']);

        }catch(\Exception $ex)
        {
           return redirect()->route('admin.offers')->with(['erorr' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Delivery;
use App\Http\Requests\DeliveryRequest;
use Illuminate\Support\Str;

class DeliveryController extends Controller
{
    public function index()
    {
        $deliveries = Delivery::selection()->get();

        return view('admin.delivery.index', compact('deliveries'));
    }

    public function create()
    {
        return view('admin.delivery.create');
    }

    public function store(DeliveryRequest $request)
    {
        try{
            //save Image
            $filepath = '';
            if($request->has('photo'))
            {
                $filepath = uploadImage('deliveries', $request->photo);
            }
           // return $request;
            $delivery = Delivery::create([
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'username' => $request->username,
                'email' => $request->email,
                'password' => $request->password,
                'phone' => $request->phone,
                'card_number' => $request->card_number,
                'age' => $request->age,
                'address' => $request->address,
                'photo' => $filepath

            ]);

            return redirect()->route('admin.delivery')->with(['success' => 'تم الحفظ بنجاح.']);


        }catch(\Exception $ex)
        {
            return $ex;
            return redirect()->route('delivery.index')->with(['error' =>  'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

    public function edit($id)
    {
        try{

            $delivery = Delivery::findOrFail($id);

            if(!$delivery)
                return redirect()->route('admin.delivery')->with(['error' => 'هذا الدليفري غير موجود.']);

            return view('admin.delivery.edit', compact('delivery'));    

        }catch(\Exception $ex)
        {
            return $ex;
            return redirect()->route('delivery.index')->with(['error' =>  'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

    public function update(DeliveryRequest $request, $id)
    {
        try{
            
            $delivery = Delivery::findOrFail($id);

            if(!$delivery)
             return redirect()->route('admin.delivery')->with(['error' => 'هذا الدليفري غير موجود.']);
          
             $data= $request->except('_token','id', 'photo', 'password');

            if($request->has('photo'))
            {
                $filepath = uploadImage('deliveries', $request->photo);
                Delivery::where('id', $id)->update(['photo' => $filepath]);
                
                $image = Str::after($delivery->photo, 'assets/');
                $image = base_path('assets/' . $image);
                unlink($image);
            }

            if($request->has('password') && $request->get('password') != '')
            {
                $data['password'] = $request->password;
            }

            Delivery::where('id', $id)->update($data);

            return redirect()->route('admin.delivery')->with(['success' => ' تم تعديل البيانات بنجاح.']);
        }catch(\Exception $ex)
        {
            return $ex;
            return redirect()->route('delivery.index')->with(['error' =>  'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

    public function destroy($id)
    {
        try{
            $delivery = Delivery::findOrFail($id);

            if(!$delivery)
             return redirect()->route('admin.delivery')->with(['erorr' => 'هذا الدليفري غير موجود.']);

             $delivery->delete();

             $image = Str::after($delivery->photo, 'assets/');
             $image = base_path('assets/' . $image);
             unlink($image);
             return redirect()->route('admin.delivery')->with(['success' => ' تم حذف البيانات بنجاح.']);

        }catch(\Exception $ex)
        {
            return redirect()->route('delivery.index')->with(['error' =>  'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }


    
}

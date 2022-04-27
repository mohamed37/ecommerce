<?php

namespace App\Http\Controllers\Admin;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CustomerRequest;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\frontRequests\customerLoginRequest;

class LoginController extends Controller
{
    
    
    public function getLogin()
    {
        return view('admin.Auth.login');
         
    }

     public function login(LoginRequest $request)
    {
       
        try{
            $remember_me = $request->has('remember_me') ? true : false;

            if (Auth::guard('admin')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")], $remember_me))
            {
                
                Session::put('email',$request->input('email'));
               
    
                //return redirect()->intended('admin/');
               return redirect() -> route('dashboard');
            }
           // notify()->error('خطا في البيانات  برجاء المجاولة مجدا ');
           // return back()->withInput($request->only('email'));
           // return back()->withInput($request->only('password'));
        }catch(\Exception $ex)
        {
            return $ex;
            return redirect()->back()->with(['error' => 'هناك خطا بالبيانات']);
        }
        

        
    }

    

    public function sginout()
    {
        try{
            
            Session::flush();
        
            Auth::logout();
    
            return redirect()->route('admin.login');

    }catch(\Exception $ex)
    {
        return $ex;
        return redirect()->route('admin.login');
    }
    }
}

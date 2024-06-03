<?php

namespace App\Http\Controllers\backend\Auth;

use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PasswordReset;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Mail;
use Illuminate\Support\str;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Carbon;


class AdminController extends Controller
{
    public function index(){
        return view('auths.login');
        // return view('backend.login');
    }

    public function register()
    {
        return view('auths.register');
        // return view('backend.sign-up');
    }

    public function login(){


        
        if(!empty(Auth::check())){
            // return redirect('admin/dashboard');
             if(Auth::user()->role == 1){
                
                
                return redirect('admin/dashboard');
            }

            else if(Auth::user()->role == 2){

                return redirect('customer/dashboard');
            }

            
        }

        return view ('auths.login');
    
    }

    public function authenticate(Request $request)
    {
        $remember = !empty($request->remember) ? true :  false ;

        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password],$remember)){
            
            // session()->put('id',$user->id);
            // session()->put('type',$user->type);


            if(Auth::user()->role == 1){
                
                return redirect('admin/dashboard');
            }

           else if(Auth::user()->role == 2){
            return redirect('customer/dashboard');
            }
              
        }else{
           
            return redirect()->back()->with('error','Either Email/Password is incrorrect');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect(url('/'));
     
    }

    public function registerUser(Request $request)
    {
        // $validator = Validator::make($request->all(),
    
        $request->validate([
            'frist' => 'required|string|max:250',
            'last' => 'required|string|max:250',
        
            'email' => 'required|email|max:250|unique:users',
            'password' => 'required|min:8|confirmed'
        ]);
 // Handle image upload
 if ($request->hasFile('image')) {
    $imagePath = $request->file('image')->store('images', 'public');
} else {
    $imagePath = null;
}
        
        User::create([
            
            'frist' => $request->frist,
            'last' => $request->last,
        
            'email' => $request->email,
            'image' => $imagePath,
        
            
        
            'password' => Hash::make($request->password)
        ]);

        $remember = !empty($request->remember) ? true :  false ;

        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password],$remember)){
                
                return redirect('admin/dashboard');
            }

    }

}


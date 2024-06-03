<?php

namespace App\Http\Controllers\backend\Auth;

// use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Validator;
// use App\Models\User;

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


class AdminloginController extends Controller
{
    public function index(){
        return view('backend.login');
    }

    public function register()
    {
        return view('auths.register');
    }

//     public function authenticate(Request $request)
// {
    
//     $validator = Validator::make($request->all(),[
//         'email'=>'required|email',
//             'password'=>'required',
//     ]);
    
//     if($validator->passes()){

//     }else{
//         return redirect()->route('admin.login')
//         ->withErrors($validator)->withInput($request->only('email'));
//     }

    
// }

public function login(){


        
    if(!empty(Auth::check())){
        // return redirect('admin/dashboard');
         if(Auth::user()->role == 1){
            
            
            return redirect('customer/dashboard');
        }

        else if(Auth::user()->role == 2){

            return redirect('admin/dashboard');
        }

        
    }

    return view ('login-form');
}
public function authenticate(Request $request)
    {
        $remember = !empty($request->remember) ? true :  false ;

        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password],$remember)){
            
            // session()->put('id',$user->id);
            // session()->put('type',$user->type);


            if(Auth::user()->role == 1){
                
                return redirect('student/dashboard');
            }

           else if(Auth::user()->role == 2){
            return redirect('admin/dashboard');
            }
            
           
        }else{
           

            return redirect()->back()->with('error','Either Email/Password is incrorrect');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect(url('/login'));
     
    }


    
    public function  registerUser(Request $request)
    {
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
                
                return redirect('adm/dashboard');
            }

    }

}

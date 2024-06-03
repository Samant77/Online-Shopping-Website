<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function dashboard(){
        return view('backend.dashboard');
}

// public function CategoryList(){
//     return view('backend.categories');
// }




}

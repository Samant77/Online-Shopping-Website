<?php

namespace App\Http\Controllers\frontend;

use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductImage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    public function index(){

        $products = Product::where('is_feature','active')->orderBy('id','DESC')->take(8)->where('status','active')->get();

            $data['featureProducts'] = $products;

            $latestProducts = Product::orderBy('id','DESC')->where('status','active')->take(8)->get();
            $data['latestProducts'] = $latestProducts;

            // dd( $products);
        return view('frontend.index-5', $data);

        // return view('frontend.index-5');
}




}

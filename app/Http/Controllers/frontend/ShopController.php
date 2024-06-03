<?php

namespace App\Http\Controllers\frontend;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\SubController;

class ShopController extends Controller
{
    

    public function shop(Request $request, $categorySlug = null, $subCategorySlug = null){
// brand 
$brandsArray=[];

if(!empty($request->get('brand'))){
    $brandsArray = expload(',',$request->get('brand'));
    // $products = Product::whereIn('brand_id', $brands)->get();
    $products =  $products->whereIn('brand_id',$brandsArray);
}
// endbrand




        $categories = Category::orderBy('id','ASC')->with('subcategories')->where('status','active')->get();

        $brands = Brand::orderBy('id','ASC')->where('status','active')->get();

        $products = Product::where('status','active');

        // Apply Filter here
        if(!empty($categorySlug)){
            $category = Category::Where('slug' , $categorySlug)->first();

            $products = $products->where('category_id',$category->id);
        }

        if(!empty($subCategorySlug)){
            $subcategories = SubCategory::Where('slug' , $subCategorySlug)->first();

            $products = $products->where('subcategory_id',$subcategories->id);
        }
        
        // $brands = $request->input('brands');    
        // $products = Product::whereIn('brand_id', $brands)->get();

        
        // $products = Product::orderBy('id','DESC')->take(8)->where('status','active')->get();

        $products = $products->orderBy('id','DESC');
        

        // $products = $products->get();
        $products = $products->paginate(6);

        $data['categories'] = $categories;
        $data['brands'] = $brands;
        $data['products'] = $products;
        $data['brandsArray'] = $brandsArray;

        return view('frontend.shop',$data);
    }


    // product page

    public function Product($slug){

        $product = Product::where('slug',$slug)->with('images')->first();
        // dd($product);
        if($product == null){
            abort(404);
        }

        $relatedProducts=[];
    
        // featch Related Products
        
        if($product->related_products != ''){
            $productArray = explode(',',$product->related_products);
        
            $relatedProducts = Product::whereIn('id',$productArray)->with('images')->get();

        }
        
        

        $data['product'] = $product;
        $data['relatedProducts'] = $relatedProducts;

        // dd($data);
        return view('frontend.product',$data);
        
    }

}

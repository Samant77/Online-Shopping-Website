<?php

namespace App\Http\Controllers\backend;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductImage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;


class ProductController extends Controller
{
    public function IndexofProduct(){

        $products = Product::all();
        // dd($products);
    
        return view('backend.product', compact('products'));
    

    }

    public function CreateProduct(){
        $categories = Category::orderBy('name','ASC')->get();
        $data['categories']= $categories;

        $subcategories = SubCategory::orderBy('name','ASC')->get();
        $data['subcategories']= $subcategories;

        $brands = Brand::orderBy('name','ASC')->get();
        $data['brands']= $brands;
        
        return view('backend.create_product',compact('categories','subcategories','brands'));
    }



    // public function StoreProduct(Request $request){

    //     $validator = Validator::make($request->all(), [
    //         'title' => 'required|string|max:255',
    //         'slug' => 'required|string|max:255|unique:categories,slug',
    //         'price' => 'required|string|max:255',
    //         'category_id' => 'required',
    //         'brand_id' => 'required',
    //         // 'is_feature' => 'required',
    //         'sku' => 'required|string',
    //         // 'track_qty' => 'required|in:flase,true',
    //         'status' => 'required|in:active,inactive',
    //     ]);
    
    //     // Create a new category instance with the validated data
    //     $product =  Product::create([
    //         'title' => $request->title,
    //         'slug' => $request->slug,
    //         'description' => $request->description,
    //         'price' => $request->price,
    //         'compare_price' => $request->compare_price,
    //         'category_id' => $request->category_id,
    //         'subcategory_id' => $request->subcategory_id,
    //         'brand_id' => $request->brand_id,
    //         'sku' => $request->sku,
    //         // 'is_feature' => $request->is_feature,
    //         'barcode' => $request->barcode,
    //         // 'track_qty' => $request->track_qty,
    //         'qty' => $request->qty,
    //         'status' => $request->status,

        
    //     ]);
    
    //         // Redirect the user to the index page with a success message
    //         return redirect()->route('product-list')->with('success', 'Product Created Successfully !!');

    // }



    public function StoreProduct(Request $request)
{
    // Validate the incoming request data
         $request->validate([
            'title' => 'required|string|max:255',
        'slug' => 'required|string|max:255|unique:categories,slug',
        'price' => 'required|string|max:255',
        'category_id' => 'required',
        'brand_id' => 'required',
        // 'is_feature' => 'required',
        'sku' => 'required|string',
        // 'track_qty' => 'required|in:flase,true',
        'status' => 'required|in:active,inactive',

    ]);

    
        $product = new Product([
            'title' => $request['title'],
            'slug' => $request['slug'],
            'description' => $request['description'],
            'price' => $request['price'],
            'compare_price' => $request['compare_price'],
            'category_id' => $request['category_id'],
            'subcategory_id' => $request['subcategory_id'],
            'brand_id' => $request['brand_id'],
            'sku' => $request['sku'],
            'barcode' => $request['barcode'],
            'qty' => $request['qty'],
            'status' => $request['status'],

            'short_description' => $request['short_description'],
            
            'shipping_return' => $request['shipping_return'],
        
            'related_products' => isset($request['related_products']) ? implode(',', $request['related_products']) : ''
        ]);
        
        $product->save();
// Handle multiple image uploads
if ($request->hasFile('images')) {
    foreach ($request->file('images') as $image) {
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('product_images'), $imageName);

        // Create a new HotelImage instance and associate it with the hotel
        $productImage = new ProductImage(['image_path' => 'product_images/' . $imageName]);
        $product->images()->save($productImage);
    }
}


return redirect()->route('product-list')->with('success', 'Product Created Successfully !!');
}



public function EditProduct($id){
    $product = Product::find($id);

    $categories = Category::orderBy('name','ASC')->get();
    $data['categories']= $categories;

    $subcategories = SubCategory::orderBy('name','ASC')->get();
    $data['subcategories']= $subcategories;

    $brands = Brand::orderBy('name','ASC')->get();
    $data['brands']= $brands;

    $relatedProducts=[];
// featch Related Products

if($product->related_products != ''){
    $productArray = explode(',' , $product->related_products);

    $relatedProducts = Product::whereIn('id',$productArray)->get();
}
// dd($relatedProducts);

    return view('backend.edit_product',compact('product','categories','subcategories','brands','relatedProducts'));
    
 }

 
public function updateProduct(Request $request, $id)
{

    $request->validate([
        'title' => 'required|string|max:255',
    'slug' => 'required|string|max:255|unique:categories,slug',
    'price' => 'required|string|max:255',
    'category_id' => 'required',
    'brand_id' => 'required',
    
    'sku' => 'required|string',

    'status' => 'required|in:active,inactive',
    'is_feature' => 'required|in:active,inactive',
    // 'track_qty' => 'required|in:active,inactive',

]);

$product = Product::findOrFail($id);
$product->update([
        'title' => $request['title'],
        'slug' => $request['slug'],
        'description' => $request['description'],
        'price' => $request['price'],
        'compare_price' => $request['compare_price'],
        'category_id' => $request['category_id'],
        'subcategory_id' => $request['subcategory_id'],
        'brand_id' => $request['brand_id'],
        'sku' => $request['sku'],
        'barcode' => $request['barcode'],
        'qty' => $request['qty'],
        'status' => $request['status'],
        'is_feature' => $request['is_feature'],
        // 'track_qty' => $request['track_qty'],
    
    'short_description' => $request['short_description'],
            
            'shipping_return' => $request['shipping_return'],

            // 'related_products'=>$request[(!empty('related_products'))? implode(',','related_products'):'']
            'related_products' => isset($request['related_products']) ? implode(',', $request['related_products']) : ''

    ]);
    
    $product->save();
// Handle multiple image uploads
if ($request->hasFile('images')) {
foreach ($request->file('images') as $image) {
    $imageName = time() . '_' . $image->getClientOriginalName();
    $image->move(public_path('product_images'), $imageName);

    // Create a new HotelImage instance and associate it with the hotel
    $productImage = new ProductImage(['image_path' => 'product_images/' . $imageName]);
    $product->images()->save($productImage);
}
}


return redirect()->route('product-list')->with('success', 'Product Update Successfully !!');
}


public function DeleteProduct($id){
    $product = Product::findorFail($id);
    
    $product->delete();
    return redirect()->route('product-list', $product->id)->with('danger', 'Product Delete successfully!!!');
 }

 public function getProducts(Request $request){

    $tempProduct=[];
    if($request->term != ""){
        $products = Product::where('title','like','%'.$request->term.'%')->get();

        if($products != null){
            foreach($products  as $product){
                $tempProduct[]= array('id'=> $product->id,'text'=>$product->title);
            }
        }
    }

return response()->json([
    'tags' => $tempProduct,
    'status' => true
]);


}
}

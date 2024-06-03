<?php

namespace App\Http\Controllers\backend;
use App\Models\User;
use App\Models\Category;
use App\Models\Brand;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class BrandController extends Controller
{
    public function IndexofBrand(){

        $brands = Brand::all();
        // dd($brands);
        return view('backend.brands', compact('brands'));
    

    }

    public function CreateBrand(){
        return view('backend.create_brand');
    }



    public function StoreBrand(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:categories,slug',
            'status' => 'required|in:active,inactive',
        ]);
    
        // Create a new category instance with the validated data
        $brand =  Brand::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'status' => $request->status,

        
        ]);
            // Redirect the user to the index page with a success message
            return redirect()->route('brand-list')->with('success', 'Brand Created Successfully !!');

    }

    
public function EditBrand($id){
    $brand = Brand::find($id);
    return view('backend.edit_brand',compact('brand'));
    
 }


public function updateBrand(Request $request, $id)
{

$validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:categories,slug',
            'status' => 'required|in:active,inactive',
        ]);
    
        // Create a new category instance with the validated data
        $brand = Brand::findOrFail($id);
        $brand->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'status' => $request->status,

        
        ]);
        
        $brand->save();
        // Redirect the user to the index page with a success message
        return redirect()->route('brand-list')->with('success', 'Brand Update Successfully !!');
}

public function delete($id){
    $brand = Brand::findorFail($id);
    
    $brand->delete();
    return redirect()->route('brand-list', $brand->id)->with('danger', 'Brand Delete successfully!!!');
 }

}

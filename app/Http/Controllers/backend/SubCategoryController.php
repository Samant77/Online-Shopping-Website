<?php

namespace App\Http\Controllers\backend;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class SubCategoryController extends Controller
{
    public function IndexOfSubCategory(){

        // $subcategories = SubCategory::select('sub_categories.*','categories.name as categoriesName')->all()->leftJoin(' categories',' categories.id','sub_categories. categories_id');

        $subcategories = SubCategory::all();
        // dd($subcategories);
        return view('backend.subcategory', compact('subcategories'));

    }

    public function CreatSubCatrgory(){
           $categories = Category::orderBy('name','ASC')->get();
        $data['categories']= $categories;
        // dd( $categories);

        // $categories = Category::all();
        return view('backend.create-subcategory',compact('categories'));
    }


    public function StoreSubCatrgory(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:categories,slug',
            'status' => 'required|in:active,inactive',
            'showhome' => 'required|in:active,inactive',
            'category_id' => 'required',
        ]);
    
        // Create a new category instance with the validated data
        $subcategory =  SubCategory::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'status' => $request->status,

            'category_id' => $request->category_id,

            'showhome' => $request->showhome,
        ]);
        
    
    
        // Redirect the user to the index page with a success message
        return redirect()->route('subcategory-list')->with('success', 'Sub Category created successfully !!');
    
}

public function editSubCategory($id){
    $categories = Category::orderBy('name','ASC')->get();
    $data['categories']= $categories;

    $subcategory = SubCategory::find($id);
    return view('backend.editsubcategory',compact('subcategory','categories'));
  
 }


 
public function SubCategoryUpdated(Request $request, $id)
{

$validator = Validator::make($request->all(), [
    'name' => 'required|string|max:255',
    'slug' => 'required|string|max:255|unique:categories,slug',
    'status' => 'required|in:active,inactive',
    'showhome' => 'required|in:active,inactive',
    'category_id' => 'required',
        ]);
    
        // Create a new category instance with the validated data
        $subcategory = SubCategory::findOrFail($id);
        $subcategory->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'status' => $request->status,
            'category_id' => $request->category_id,
            // 'category_id' => $request->category_id,
            'showhome' => $request->showhome,
        
        ]);
        
        $subcategory->save();
        // Redirect the user to the index page with a success message
        return redirect()->route('subcategory-list')->with('success', 'Sub Category Update Successfully !!!');

}

public function deletesubcategory($id){
    $subcategory = SubCategory::findorFail($id);
    
    $subcategory->delete();
    return redirect()->route('subcategory-list', $subcategory->id)->with('danger', 'Sub Category Delete successfully!!!');
 }


}

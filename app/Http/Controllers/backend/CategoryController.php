<?php

namespace App\Http\Controllers\backend;

use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;



class CategoryController extends Controller
{
    public function index(){

        $categories = Category::all();
        // dd($categories);
        return view('backend.categories', compact('categories'));

    }

    public function CreatCatrgory(){
        return view('backend.create-category');
    }

    public function StoreCatrgory(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:categories,slug',
            'status' => 'required|in:active,inactive',
            'showhome' => 'required|in:active,inactive',
        ]);
    
        // Create a new category instance with the validated data
        $category =  Category::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'status' => $request->status,
            'showhome' => $request->showhome,
        
        ]);
        
    
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();  
            $request->image->storeAs('public/images', $imageName);
            $category->image_path = $imageName;
        }

        $category->save();

        // Redirect the user to the index page with a success message
        return redirect()->route('backend.category-list')->with('success', 'Category created successfully !!');

    
}




public function edit($id){
    $category = Category::find($id);
    return view('backend.edit_categories',compact('category'));
    
 }


public function update(Request $request, $id)
{

$validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:categories,slug',
            'status' => 'required|in:active,inactive',
            'showhome' => 'required|in:active,inactive',
        ]);
    
        // Create a new category instance with the validated data
        $category = Category::findOrFail($id);
        $category->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'status' => $request->status,
            'showhome' => $request->showhome,
        
        
        ]);
        
        // $category->save();

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();  
            $request->image->storeAs('public/images', $imageName);
            $category->image_path = $imageName;
        }

        $category->save();
        // Redirect the user to the index page with a success message
        return redirect()->route('backend.category-list')->with('success', 'Category Update Successfully !!!');

}

public function delete($id){
    $category = Category::findorFail($id);
    
    $category->delete();
    return redirect()->route('backend.category-list', $category->id)->with('danger', 'Category Delete successfully!!!');
 }

 
}

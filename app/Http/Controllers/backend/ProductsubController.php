<?php

namespace App\Http\Controllers\backend;
use App\Models\Category;
use App\Models\SubCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductsubController extends Controller
{


public function getSubcategories(Request $request)
    {
        $categoryId = $request->input('category_id');
        
        // Fetch subcategories based on the selected category ID
        $subcategories = Subcategory::where('category_id', $categoryId)->get();
        
        return response()->json($subcategories);
    }
}

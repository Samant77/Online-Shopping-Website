<?php
use App\Models\Category;
use App\Models\SubCategory;
 function getCategories()
{
    // orderBy('name','ASC')
    return Category::orderBy('id','DESC')->with('subcategories')->where('status','active')->where('showhome','active')->get();
}
?>

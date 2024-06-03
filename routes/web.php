<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\backend\BrandController;
use App\Http\Controllers\backend\IndexController;
use App\Http\Controllers\frontend\CartController;
use App\Http\Controllers\frontend\MainController;
use App\Http\Controllers\frontend\ShopController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\Auth\AdminController;
use App\Http\Controllers\backend\ProductsubController;
use App\Http\Controllers\backend\SubCategoryController;
use App\Http\Controllers\backend\Auth\AdminloginController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// ?- it is optional 

// frontend
Route::get('/',[MainController::class,'index']);

Route::get('/shop/{categorySlug?}/{subCategorySlug?}',[ShopController::class,'shop'])->name('front.shop');

Route::get('/product/{slug}',[ShopController::class,'Product'])->name('front.product');

// Route::get('/filtered-products', [ShopController::class, 'filteredProducts'])->name('front.filtered.products');

// Cart

Route::get('/cart',[CartController::class,'cart'])->name('front.cart');

Route::post('/add-to-cart',[CartController::class,'addToCart'])->name('front.addToCart');



// backend

    Route::get('/login',[AdminController::class,'index'])->name('auth.login');


    Route::get('/register',[AdminController::class,'register']);

    Route::post('/registeruser',[AdminController::class,'registerUser'])->name('register-user');
    Route::POST('/authenticate',[AdminController::class,'authenticate'])->name('admin-authenticate');






Route::group(['middleware'=>'admin'],function(){    

    Route::get('admin/dashboard',[IndexController::class,'dashboard'])->name('backend.home');

    Route::get('/logout',[AdminController::class,'logout'])->name('admin-logout');


    // category Route

    Route::get('admin/categories-create',[CategoryController::class,'CreatCatrgory'])->name('create-categories');

    Route::post('admin/categories-store',[CategoryController::class,'StoreCatrgory'])->name('categories.store');

    Route::get('admin/categories',[CategoryController::class,'index'])->name('backend.category-list');

    Route::get('admin/categories/{id}/edit',[CategoryController::class,'edit'])->name('backend.category-edit');

    Route::put('admin/categories/{id}',[CategoryController::class,'update'])->name('backend.category-update');


Route::get('/deleteCategory/{id}',[CategoryController::class,'delete'])->name('delete.category');

// subCategory route


Route::get('admin/subcategories',[SubCategoryController::class,'IndexOfSubCategory'])->name('subcategory-list');

Route::get('admin/subcategories-create',[SubCategoryController::class,'CreatSubCatrgory'])->name('create-subcategories');

Route::post('admin/subcategories-store',[SubCategoryController::class,'StoresubCatrgory'])->name('subcategories.store');


Route::get('admin/subcategories/{id}/edit',[SubCategoryController::class,'editSubCategory'])->name('subcategory-edit');


Route::put('admin/subcategories/{id}',[SubCategoryController::class,'SubCategoryUpdated'])->name('subcategory-update');

Route::get('admin/deletesubcategory/{id}',[SubCategoryController::class,'deletesubcategory'])->name('delete.subcategory');



// Brand route

Route::get('admin/brand',[ BrandController::class,'IndexOfBrand'])->name('brand-list');

Route::get('admin/brand-create',[ BrandController::class,'CreateBrand'])->name('brand-create');

Route::post('admin/brand-store',[ BrandController::class,'StoreBrand'])->name('brand.store');

Route::get('admin/brand/{id}/edit',[BrandController::class,'EditBrand'])->name('brand-edit');



Route::put('admin/brand/{id}',[BrandController::class,'updateBrand'])->name('brand-update');


// Route::get('admin/deletebrand/{id}',[BrandController::class,'DeleteBrand'])->name('delete.brand');

Route::get('admin/deletebrand/{id}',[BrandController::class,'delete'])->name('delete.brand');



// Product Route

// Route::get('/subcategories/get', 'SubcategoryController@getSubcategories')->name('subcategories.get');


Route::get('admin/subcategories/get',[ProductsubController::class,'getSubcategories'])->name('subcategories.get');

Route::get('admin/product',[ProductController::class,'IndexOfProduct'])->name('product-list');


Route::get('admin/product-create',[ProductController::class,'CreateProduct'])->name('product-create');

Route::post('admin/product-store',[ ProductController::class,'StoreProduct'])->name('product.store');

Route::get('admin/product/{id}/edit',[ProductController::class,'EditProduct'])->name('product-edit');


Route::put('admin/product/{id}',[ProductController::class,'updateProduct'])->name('product-update');


Route::get('admin/deleteproduct/{id}',[ProductController::class,'DeleteProduct'])->name('delete.product');

Route::get('admin/get-product',[ProductController::class,'getProducts'])->name('products.getProducts');

    });






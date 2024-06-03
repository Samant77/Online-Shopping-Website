<?php

namespace App\Http\Controllers\frontend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function addToCart(Request $request){
        $product = Product::with('images')->find($request->id);
         
            if($product==null){
                return response()->json([
                    'status' => false,
                    'message' => 'Product not found'
                ]);
            }

            if(Cart::count()>0){
// product found in cart
// check if this product already in the cart
// return as a message that product already added in your cart
// if product not found in the cart , then add product in cart

            $cartContent = Cart::content();
            $productAlreadyExist = false;

            foreach($cartContent as $item){
                if($item->id == $product->id){
                    $productAlreadyExist = true;
                }
            }
             if($productAlreadyExist == false){
                Cart::add($product->id, $product->title , 1, $product->price,['productImage'=>(!empty($product->images))? $product->images->first(): '']);

                $status = true;
                $message = $product->title . ' added in cart';
             }else{

                $status = false;
                $message = $product->title . ' already added in cart';

             }


            }else{
                
                // cart is empty
                Cart::add($product->id, $product->title , 1, $product->price,['productImage'=>(!empty($product->images))? $product->images->first() : '']);

                $status = true;
                $message = $product->title . ' added in cart';
            }

            return response()->json([
                'status' => $status,
                'message' => $message
            ]);

        // Cart::add('293ad', 'Product 1', 1, 9.99);
    }

    public function cart(){
    
        $cartContent = Cart::content();
        $data['cartContent']= $cartContent;
        // dd($cartContent);
        return view('frontend.cart',$data);
    }
}

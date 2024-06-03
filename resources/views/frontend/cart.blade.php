@extends('frontend.layout.main')
@section('main-container')


<main class="main-wrapper">

    <!-- Start Cart Area  -->
    <div class="axil-product-cart-area axil-section-gap">
    <div class="container">
    <div class="axil-product-cart-wrap">
    <div class="product-table-heading">
    <h4 class="title">Your Cart</h4>
    <a href="#" class="cart-clear">Clear Shoping Cart</a>
    </div>

    <div class="table-responsive">
    <table class="table axil-product-table axil-cart-table mb--40">
    <thead>
    <tr>
    <th scope="col" class="product-remove"></th>
    <th scope="col" class="product-thumbnail">Product</th>
    <th scope="col" class="product-title"></th>
    <th scope="col" class="product-price">Price</th>
    <th scope="col" class="product-quantity">Quantity</th>
    <th scope="col" class="product-subtotal">Subtotal</th>
    </tr>
    </thead>
    <tbody>

        @if(!empty($cartContent))
        @foreach ($cartContent as $item)
            
    <tr>
    <td class="product-remove"><a href="#" class="remove-wishlist"><i class="fal fa-times"></i></a></td>

    <td class="product-thumbnail">
    
        @if(is_object($item->options['productImage']) && !empty($item->options['productImage']->image_path))

        <a href="#"><img src="{{ asset('public/'.$item->options['productImage']->image_path) }}" ></a>
        
@endif
    </td>

    <td class="product-title"><a href="single-product.html">{{$item->name}}</a></td>

    <td class="product-price" data-title="Price"><span class="currency-symbol">$</span>{{$item->price}}</td>

    <td class="product-quantity" data-title="Qty">
    <div class="pro-qty">
    <input type="number" class="quantity-input" value="{{$item->qty}}">
    </div>
    </td>

    
    <td class="product-subtotal" data-title="Subtotal"><span class="currency-symbol">$</span>{{$item->price*$item->qty}}</td>
    </tr>

    @endforeach
    @endif

    </tbody>
    </table>
    </div>


    <div class="cart-update-btn-area">
    <div class="input-group product-cupon">
    <input placeholder="Enter coupon code" type="text">
    <div class="product-cupon-btn">
    <button type="submit" class="axil-btn btn-outline">Apply</button>
    </div>
    </div>
    <div class="update-btn">
    <a href="#" class="axil-btn btn-outline">Update Cart</a>
    </div>
    </div>



    <div class="row">
    <div class="col-xl-5 col-lg-7 offset-xl-7 offset-lg-5">
    <div class="axil-order-summery mt--80">
    <h5 class="title mb--20">Order Summary</h5>
    <div class="summery-table-wrap">
    <table class="table summery-table mb--30">
    <tbody>
    <tr class="order-subtotal">
    <td>Subtotal</td>
    <td>${{Cart::subtotal()}}</td>
    </tr>
    <tr class="order-shipping">
    <td>Shipping</td>
    <td>
{{-- 
    <div class="input-group">
    <input type="radio" id="radio1" name="shipping" checked>
    <label for="radio1">Free Shippping</label>
    </div> --}}

    <div class="input-group">
    {{-- <input type="radio" id="radio2" name="shipping"> --}}
    <label for="radio2">Local: $.00</label>
    </div>
{{-- 
    <div class="input-group">
    <input type="radio" id="radio3" name="shipping">
    <label for="radio3">Flat rate: $12.00</label>
    </div> --}}

    </td>
    </tr>
    {{-- <tr class="order-tax">
    <td>State Tax</td>
    <td>$.00</td>
    </tr> --}}
    <tr class="order-total">
    <td>Total</td>
    <td class="order-total-amount">${{Cart::subtotal()}}</td>
    </tr>
    </tbody>
    </table>
    </div>
    <a href="checkout.html" class="axil-btn btn-bg-primary checkout-btn">Process to Checkout</a>
    </div>
    </div>
    </div>




    </div>
    </div>
    </div>
    <!-- End Cart Area  -->
    
    </main>
    <script>
        $('.add').click(function(){
      var qtyElement = $(this).parent().prev(); // Qty Input
      var qtyValue = parseInt(qtyElement.val());
      if (qtyValue < 10) {
          qtyElement.val(qtyValue+1);
      }            
  });

  $('.sub').click(function(){
      var qtyElement = $(this).parent().next(); 
      var qtyValue = parseInt(qtyElement.val());
      if (qtyValue > 1) {
          qtyElement.val(qtyValue-1);
      }        
  });

    </script>
@endsection
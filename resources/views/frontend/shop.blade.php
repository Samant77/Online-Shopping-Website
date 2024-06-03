@extends('frontend.layout.main')
@section('main-container')

<main class="main-wrapper">
    <!-- Start Breadcrumb Area  -->
    <div class="axil-breadcrumb-area">
    <div class="container">
    <div class="row align-items-center">
    <div class="col-lg-6 col-md-8">
    <div class="inner">
    <ul class="axil-breadcrumb">
    <li class="axil-breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
    <li class="separator"></li>
    <li class="axil-breadcrumb-item active" aria-current="page">Shop</li>
    </ul>
    <h1 class="title">Explore All Products</h1>
    </div>
    </div>
    <div class="col-lg-6 col-md-4">
    <div class="inner">
    <div class="bradcrumb-thumb">
    <img src="{{asset('public/frontend/assets/images/product/product-45.png')}}" alt="Image">
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    <!-- End Breadcrumb Area  -->
    
    <!-- Start Shop Area  -->
    <div class="axil-shop-area axil-section-gap bg-color-white">
    <div class="container">
    <div class="row">
    <div class="col-lg-3">
    <div class="axil-shop-sidebar">
    <div class="d-lg-none">
    <button class="sidebar-close filter-close-btn"><i class="fas fa-times"></i></button>
    </div>
    
    <div class="toggle-list product-categories active">
    <h6 class="title">CATEGORIES</h6>
    <div class="shop-submenu">
    

<div class="accordion accordion-flush" id="accordionFlushExample">

  @if($categories->isNotEmpty())
  @foreach ($categories as $key => $category)

    <div class="accordion-item">
      @if($category->subcategories->isNotEmpty())

      <h2 class="accordion-header"  >
        <button class="accordion-button collapsed  elec" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne-{{$key}}" aria-expanded="false" aria-controls="flush-collapseOne-{{$key}}" style="font-size:15px">
          {{$category->name}}
        </button>
      </h2>
      @else
      <a href="{{route("front.shop",$category->slug)}}" class="nav-item elec" style="margin-left:12px;">{{$category->name}}</a>

      @endif

      @if($category->subcategories->isNotEmpty())
      <div id="flush-collapseOne-{{$key}}" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
        <div class="accordion-body"><div class="navbar-nav">
          @foreach ($category->subcategories as $subcategory)

          <a href="{{route("front.shop",[$category->slug , $subcategory->slug])}}" class="nav-item nav-link">{{$subcategory->name}}</a>

          @endforeach                         
          </div></div>
      </div>
      @endif 
    </div>
    @endforeach
    @endif

  

  </div>

{{-- end nav --}}
    </div>
    </div>


    <div class="toggle-list product-categories product-gender active">
    <h6 class="title">Brand</h6>
    <div class="shop-submenu">
    <ul>
      
    
      @if($brands->isNotEmpty())
      @foreach ($brands as $brand)
    
      <div class="form-check brand-label">
        <input {{(in_array($brand->id,$brandsArray))?'checked' : ' '}}class="form-check-input " type="checkbox" name="brand[]" id="brand-{{$brand->id}}" value="{{$brand->id}}">
        <label class="form-check-label" for="brand-{{$brand->id}}">
        {{$brand->name}}
        </label>
      </div>
      
      
      </li>

      @endforeach
      @endif
    
      
    </ul>
    </div>
    </div>
    

    <div class="toggle-list product-price-range active">
    <h6 class="title">PRICE</h6>
    <div class="shop-submenu">
    <ul>
    <li class="chosen"><a href="#">30</a></li>
    <li><a href="#">5000</a></li>
    </ul>
    <form action="#" class="mt--25">
    <div id="slider-range"></div>
    <div class="flex-center mt--20">
    <span class="input-range">Price: </span>
    <input type="text" id="amount" class="amount-range" readonly>
    </div>
    </form>
    </div>
    </div>
    {{-- <button class="axil-btn btn-bg-primary" type="submit">All Reset</button> --}}
    </div>
    <!-- End .axil-shop-sidebar -->
    </div>
    <div class="col-lg-9">
    <div class="row">
    <div class="col-lg-12">
    <div class="axil-shop-top mb--40">
    <div class="category-select align-items-center justify-content-lg-end justify-content-between">
    <!-- Start Single Select  -->
    <span class="filter-results">Showing 1-12 of 84 results</span>
    <select class="single-select">
    <option>Short by Latest</option>
    <option>Short by Oldest</option>
    <option>Short by Name</option>
    <option>Short by Price</option>
    </select>
    <!-- End Single Select  -->
    </div>
    <div class="d-lg-none">
    <button class="product-filter-mobile filter-toggle"><i class="fas fa-filter"></i> FILTER</button>
    </div>
    </div>
    </div>
    </div>
    <!-- End .row -->

    <div class="row row--15">

      @if($products->isNotEmpty())
      @foreach ($products as $product)

    <div class="col-xl-4 col-sm-6" >
    <div class="axil-product product-style-one mb--30" >
    <div class="thumbnail">
    <a href="{{route('front.product',$product->slug)}}">
      @if($product->images->isNotEmpty())<img src="{{ asset('public/'. $product->images->first()->image_path) }} " alt="product Image" class="img-thumbnail" width="50" >@else
      No Image Available
      @endif
    </a>
    <div class="label-block label-right">
    <div class="product-badget">10% OFF</div>
    </div>
    <div class="product-hover-action">
    <ul class="cart-action">
    <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
    <li class="select-option"><a href="javascript:void(0);" onclick="addToCart({{$product->id}});">Add to Cart</a></li>
    <li class="quickview"><a href="#" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
    </ul>
    </div>
    </div>
    <div class="product-content">
    <div class="inner">
    <h5 class="title"><a href="#">{{$product->title}}</a></h5>
    <div class="product-price-variant">
    <span class="price current-price">${{$product->price}}</span>

    @if ($product->compare_price >0)
            <span class="price old-price">${{$product->compare_price}}</span>
            @endif
    </div>
    </div>
    </div>
    </div>
    </div>
@endforeach
@endif

    <!-- End Single Product  -->
    
    <!-- End Single Product  -->
    </div>

    <div class="text-center  pt--20" >
    
       {{ $products->links('pagination::bootstrap-5') }}

    {{-- <a href="#" class="axil-btn btn-bg-lighter btn-load-more">Load more</a> --}}
    {{-- pt--20 --}}
    
  </div>

    </div>
    </div>
    </div>
    <!-- End .container -->
    </div>
    <!-- End Shop Area  -->
    
    <!-- Start Axil Newsletter Area  -->
    <div class="axil-newsletter-area axil-section-gap pt--0">
    <div class="container">
    <div class="etrade-newsletter-wrapper bg_image bg_image--5">
    <div class="newsletter-content">
    <span class="title-highlighter highlighter-primary2"><i class="fas fa-envelope-open"></i>Newsletter</span>
    <h2 class="title mb--40 mb_sm--30">Get weekly update</h2>
    <div class="input-group newsletter-form">
    <div class="position-relative newsletter-inner mb--15">
    <input placeholder="example@gmail.com" type="text">
    </div>
    <button type="submit" class="axil-btn mb--15">Subscribe</button>
    </div>
    </div>
    </div>
    </div>
    <!-- End .container -->
    </div>
    <!-- End Axil Newsletter Area  -->
    </main>
    
    <style>
        
        /* mouse over link */
.nav-link:hover {
  color: rgb(254, 87, 4);
}

.elec:hover {
  color:  rgb(133, 4, 254);
}
    </style>


@endsection
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


  
<script>
  jQuery(function($) {
  $(".brand-label").change(function(){
    apply_filters();
  });

  function apply_filters(){

    var brands = [];
    $(".brand-label").each(function(){

        if($(this).is(":checked")== true){
          brands.push($(this).val());
        }
    });
console.log(brands.toString());

    var url = '{{url()->current()}}?';

    window.location.herf= url+'$brand='+brands.toString();

  }
});
</script> --}}


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<script>
  jQuery(function($) {
    $(".brand-label").change(function(){
      apply_filters();
      
    });

    function apply_filters(){
      var brands = [];
      $(".brand-label").each(function(){
        if($(this).is(":checked")){
          brands.push($(this).val());
        }
      });
      
      console.log(brands.toString());

      var url = '{{ url()->current() }}?';
      window.location.href = url + '&brand=' + brands.join('&');

      // window.location.href = url+'&brand='+encodeURIComponent(brands.join(','));

      
    }
  });
</script>

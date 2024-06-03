<!doctype html>
<html class="no-js" lang="en">


<!-- Mirrored from new.axilthemes.com/demo/template/etrade/index-5.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 15 Apr 2024 08:37:21 GMT -->
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>eTrade || Home-05</title>
<meta name="robots" content="noindex, follow" />
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- Favicon -->
<link rel="shortcut icon" type="image/x-icon" href="{{asset('public/frontend/assets/images/favicon.png')}}">

<!-- CSS
============================================ -->

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="{{asset('public/frontend/assets/css/vendor/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('public/frontend/assets/css/vendor/font-awesome.css')}}">
<link rel="stylesheet" href="{{asset('public/frontend/assets/css/vendor/flaticon/flaticon.css')}}">
<link rel="stylesheet" href="{{asset('public/frontend/assets/css/vendor/slick.css')}}">
<link rel="stylesheet" href="{{asset('public/frontend/assets/css/vendor/slick-theme.css')}}">
<link rel="stylesheet" href="{{asset('public/frontend/assets/css/vendor/jquery-ui.min.css')}}">
<link rel="stylesheet" href="{{asset('public/frontend/assets/css/vendor/sal.css')}}">
<link rel="stylesheet" href="{{asset('public/frontend/assets/css/vendor/magnific-popup.css')}}">
<link rel="stylesheet" href="{{asset('public/frontend/assets/css/vendor/base.css')}}">
<link rel="stylesheet" href="{{asset('public/frontend/assets/css/style.min.css')}}">

<meta name="csrf-token" content="{{csrf_token()}}">

</head>


<body class="sticky-header">
<!--[if lte IE 9]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->
<a href="#top" class="back-to-top" id="backto-top"><i class="fal fa-arrow-up"></i></a>
<!-- Start Header -->
<header class="header axil-header header-style-5">
<div class="axil-header-top">
<div class="container">
<div class="row align-items-center">
<div class="col-lg-6 col-sm-6 col-12">
<div class="header-top-dropdown">
<div class="dropdown">
<button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
English
</button>
<ul class="dropdown-menu">
<li><a class="dropdown-item" href="#">English</a></li>
<li><a class="dropdown-item" href="#">Arabic</a></li>
<li><a class="dropdown-item" href="#">Spanish</a></li>
</ul>
</div>
<div class="dropdown">
<button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
USD
</button>
<ul class="dropdown-menu">
<li><a class="dropdown-item" href="#">USD</a></li>
<li><a class="dropdown-item" href="#">AUD</a></li>
<li><a class="dropdown-item" href="#">EUR</a></li>
</ul>
</div>
</div>
</div>
<div class="col-lg-6 col-sm-6 col-12">
<div class="header-top-link">
<ul class="quick-link">
<li><a href="#">Help</a></li>
<li><a href="sign-up.html">Join Us</a></li>
<li><a href="sign-in.html">Sign In</a></li>
</ul>
</div>
</div>
</div>
</div>
</div>
<!-- Start Mainmenu Area  -->
<div id="axil-sticky-placeholder"></div>
<div class="axil-mainmenu">
<div class="container">
<div class="header-navbar">
<div class="header-brand">
<a href="index.html" class="logo logo-dark">
<img src="{{asset('public/frontend/assets/images/logo/logo.png')}}" alt="Site Logo">
</a>
<a href="index.html" class="logo logo-light">
<img src="{{asset('public/frontend/assets/images/logo/logo-light.png')}}" alt="Site Logo">
</a>
</div>



<div class="header-main-nav">
<!-- Start Mainmanu Nav -->
<nav class="mainmenu-nav">
<button class="mobile-close-btn mobile-nav-toggler"><i class="fas fa-times"></i></button>
<div class="mobile-nav-brand">
<a href="#" class="logo">
<img src="{{asset('public/frontend/assets/images/logo/logo.png')}}" alt="Site Logo">
</a>
</div>

<ul class="mainmenu">
    
<li class="menu-item-has">
<a href="{{url("/")}}">Home</a>
{{-- <ul class="axil-submenu">
<li><a href="index-1.html">Home - Electronics</a></li>

</ul> --}}
</li>

<li class="menu-item-has">
<a href="{{route('front.shop')}}">Shop</a>
{{-- 
@if(getCategories()->isNotEmpty())
<ul class="axil-submenu">
    @foreach (getCategories() as $category )
    <li><a href="#">{{$category->name}}        
        </a>
    </li>
@endforeach
</ul>
@endif --}}
</li>



<li class="menu-item-has-children">
<a href="#">Pages</a>
<ul class="axil-submenu">
<li><a href="#">Wishlist</a></li>
    





</ul>
</li>


<li><a href="about-us.html">About</a>
</li>


<li class="menu-item-has">
<a href="#">Gallery</a>

</li>

{{-- <li><a href="contact.html">Contact</a></li> --}}
</ul>
</nav>
<!-- End Mainmanu Nav -->
</div>



<div class="header-action">
<ul class="action-list">
<li class="axil-search d-xl-block d-none">
<input type="search" class="placeholder product-search-input" name="search2" id="search2" value="" maxlength="128" placeholder="What are you looking for?" autocomplete="off">
<button type="submit" class="icon wooc-btn-search">
<i class="flaticon-magnifying-glass"></i>
</button>
</li>
<li class="axil-search d-xl-none d-block">
<a href="javascript:void(0)" class="header-search-icon" title="Search">
<i class="flaticon-magnifying-glass"></i>
</a>
</li>
<li class="wishlist">
<a href="wishlist.html">
<i class="flaticon-heart"></i>
</a>
</li>
<li class="shopping-cart">
<a href="#" class="cart-dropdown-btn">
<span class="cart-count">3</span>
<i class="flaticon-shopping-cart"></i>
</a>
</li>
<li class="my-account">
<a href="javascript:void(0)">
<i class="flaticon-person"></i>
</a>
<div class="my-account-dropdown">
<span class="title">QUICKLINKS</span>
<ul>
<li>
<a href="my-account.html">My Account</a>
</li>
<li>
<a href="#">Initiate return</a>
</li>
<li>
<a href="#">Support</a>
</li>
<li>
<a href="#">Language</a>
</li>
</ul>
<a href="sign-in.html" class="axil-btn btn-bg-primary">Login</a>
<div class="reg-footer text-center">No account yet? <a href="sign-up.html" class="btn-link">REGISTER HERE.</a></div>
</div>
</li>
<li class="axil-mobile-toggle">
<button class="menu-btn mobile-nav-toggler">
<i class="flaticon-menu-2"></i>
</button>
</li>
</ul>
</div>
</div>
</div>
</div>


<!-- End Mainmenu Area -->
<div class="header-top-campaign">
<div class="container">
<div class="row justify-content-center">
<div class="col-xl-5 col-lg-6 col-md-10">
<div  class="header-campaign-activation axil-slick-arrow arrow-both-side header-campaign-arrow">
<div class="slick-slide">
<div class="campaign-content">
<p>STUDENT NOW GET 10% OFF : <a href="#">GET OFFER</a></p>
</div>
</div>
<div class="slick-slide">
<div class="campaign-content">
<p>STUDENT NOW GET 10% OFF : <a href="#">GET OFFER</a></p>
</div>
</div>
</div>

</div>
</div>
</div>
</div>
</header>


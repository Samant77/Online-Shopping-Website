@extends('frontend.layout.main')
@section('main-container')
<!-- Common Banner Area -->

<br>
<!--  Common Author Area -->
<section id="common_author_area" class="section_padding">
<div class="container">
<div class="row">
<div class="col-lg-8 offset-lg-2">
<div class="common_author_boxed">
<div class="common_author_heading">

<h2>Logged in to stay in touch</h2>
</div>
@include('auths.message')

<div class="common_author_form">

<form action="{{route('admin-authenticate')}}" method="post" id="main_author_form">

    
@csrf

<div class="form-group">
<input type="text" class="form-control  " placeholder="Enter Email" name="email"  value="{{ old('email') }}"/>


</div>

<div class="form-group">
<input type="password" class="form-control" placeholder="Enter password" name="password"/>

<br>
<a href="#">Forgot password?</a>
</div>

<div class="common_form_submit">
{{-- <button class="btn btn_theme btn_md" type="submit">Log in</button> --}}
<button class="tf-button w-full btn btn-primary btn-lg " type="submit"  style="font-size: 20px;">Login</button>

</div>
<div class="have_acount_area">
<p>Dont have an account? <a href="{{url('register')}}">Register now</a></p>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</section>
@endsection
@extends('frontend.layout.main')
@section('main-container')






    
<br>
    <!--  Common Author Area -->
    <section id="common_author_area" class="section_padding">
    <div class="container">
    <div class="row">
    <div class="col-lg-8 offset-lg-2">
    <div class="common_author_boxed">
    <div class="common_author_heading">
    {{-- <h3>Register account</h3> --}}
    <h2>Register your account</h2>
    </div>
    <div class="common_author_form">
        @include('auths.message')

    <form action="{{route('register-user')}}" method="post"  id="main_author_form" enctype="multipart/form-data">

        {{-- success
    @if(Session::has('success'))
<div class="alert alert-success">{{Session::get('success')}}</div>
@endif
@if(Session::has('fail'))
<div class="alert alert-danger">{{Session::get('fail')}}</div>
@endif --}}

        @csrf

    <div class="form-group">
    <input type="text" class="form-control  @error('frist') is-invalid @enderror" placeholder="Enter first name*" name="frist"value="{{ old('frist') }}" />
    

    @error('frist')
<p class="invalid-feedback" role="alert">
{{ $message }}
</p>
@enderror
    </div>

    <div class="form-group">
    <input type="text" class="form-control" placeholder="Enter last name" name="last" value="{{ old('last') }}" />
    </div>

    

    <div class="form-group">
    <input type="file" class="form-control @error('mobile') is-invalid @enderror " placeholder="upload image*" name="image" value="{{ old('image') }}"/>
    
    
    @error('image')
    <p class="invalid-feedback" role="alert">
    {{ $message }}
    </p>
    @enderror
    </div>


    <div class="form-group">
        <input type="email" class="form-control  @error('email') is-invalid @enderror "
        placeholder="your email address* " name="email"  value="{{ old('email') }}"/>


        @error('email')
        <p class="invalid-feedback" role="alert">
        {{ $message }}
        </p>
        @enderror
        </div>




    <div class="form-group">
    <input type="password" class="form-control @error('password') is-invalid @enderror " placeholder="Password*" name="password"/>
    
    @error('password')
    <p class="invalid-feedback" role="alert">
    {{ $message }}
    </p>
    @enderror
    </div>

    <div class="form-group">
        <input type="password" class="form-control" placeholder="Confirm Password*" name="password_confirmation" />

        <span class="text-danger">@error('password_confirmation'){{$message}}@enderror</span>
        </div>

    <div class="common_form_submit">

    <button class="tf-button w-full btn btn-primary btn-lg " type="submit" name="register" style="font-size: 20px;">Register</button>
    </div>
    <br>
    <p>Already have an account? <a href="{{url('/login')}}">Log in now</a></p>
    <br>
    </div>
    </form>
    </div>
    </div>
    </div>
    </div>
    </div>
    </section>

    
    
    @endsection
@extends('frontend.layout.main')
@section('main-container')

<!-- Common Banner Area -->
<section id="common_banner">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="common_bannner_text">
<h2>Verify OTP</h2>
<ul>
<li><a href="/">Home</a></li>
<li><span><i class="fas fa-circle"></i></span> Verify OTP</li>
</ul>
</div>
</div>
</div>
</div>
</section>

<!--  Common Author Area -->
<section id="common_author_area" class="section_padding">
<div class="container">
<div class="row">
<div class="col-lg-8 offset-lg-2">
<div class="common_author_boxed">
<div class="common_author_heading">
<h3>Verify OTP</h3>
<h2>Verify your OTP</h2>
</div>
<div class="common_author_form">
<form action="#" id="main_author_form">
<div class="form-group">
<div class="otpCont flex spaceBetween">
<input class="otSc form-control" type="text" maxlength="1">
<input class="otSc form-control" type="text" maxlength="1">
<input class="otSc form-control" type="text" maxlength="1">
<input class="otSc form-control" type="text" maxlength="1">
<input class="otSc form-control" type="text" maxlength="1">
</div>
</div>
<div class="common_form_submit">
<button class="btn btn_theme btn_md">Verify OTP</button>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</section>

<!-- Cta Area -->
<section id="cta_area">
<div class="container">
<div class="row align-items-center">
<div class="col-lg-7">
<div class="cta_left">
<div class="cta_icon">
<img src="{{asset('public/frontend/assets/img/common/email.png')}}" alt="icon">
</div>
<div class="cta_content">
<h4>Get the latest news and offers</h4>
<h2>Subscribe to our newsletter</h2>
</div>
</div>
</div>
<div class="col-lg-5">
<div class="cat_form">
<form id="cta_form_wrappper">
<div class="input-group"><input type="text" class="form-control"
placeholder="Enter your mail address"><button class="btn btn_theme btn_md"
type="button">Subscribe</button></div>
</form>
</div>
</div>
</div>
</div>
</section>

<!-- Footer -->


<script src="{{asset('public/frontend/assets/js/jquery-3.6.0.min.js')}}"></script>
<!-- Bootstrap js -->
<script src="{{asset('public/frontend/assets/js/bootstrap.bundle.js')}}"></script>
<!-- Meanu js -->
<script src="{{asset('public/frontend/assets/js/jquery.meanmenu.js')}}"></script>
<!-- owl carousel js -->
<script src="{{asset('public/frontend/assets/js/owl.carousel.min.js')}}"></script>
<!-- wow.js -->
<script src="{{asset('public/frontend/assets/js/wow.min.js')}}"></script>
<!-- Custom js -->
<script src="{{asset('public/frontend/assets/js/custom.js')}}"></script>
<script src="{{asset('public/frontend/assets/js/add-form.js')}}"></script>

</body>


<!-- Mirrored from andit.co/projects/html/and-tour/demo/verify-otp.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 29 Jan 2024 10:59:56 GMT -->
</html>
@endsection
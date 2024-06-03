@extends('frontend.layout.main')
@section('main-container')

<!-- Common Banner Area -->
<section id="common_banner">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="common_bannner_text">
<h2>Reset password</h2>
<ul>
<li><a href="/">Home</a></li>
<li><span><i class="fas fa-circle"></i></span> Forgot password</li>
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
<h3>Reset password</h3>
<h2>Reset you password</h2>
</div>
<div class="common_author_form">
<form action="#" id="main_author_form">
<div class="form-group">
<input type="text" class="form-control" placeholder="New password" />
</div>
<div class="form-group">
<input type="text" class="form-control" placeholder="Old password" />
</div>
<div class="common_form_submit">
<button class="btn btn_theme btn_md">Reset password</button>
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
<footer id="footer_area">
<div class="container">
<div class="row">
<div class="col-lg-3 col-md-6 col-sm-6 col-12">
<div class="footer_heading_area">
<h5>Need any help?</h5>
</div>
<div class="footer_first_area">
<div class="footer_inquery_area">
<h5>Call 24/7 for any help</h5>
<h3> <a href="tel:+00-123-456-789">+00 123 456 789</a></h3>
</div>
<div class="footer_inquery_area">
<h5>Mail to our support team</h5>
<h3> <a href="mailto:support@domain.com">support@domain.com</a></h3>
</div>
<div class="footer_inquery_area">
<h5>Follow us on</h5>
<ul class="soical_icon_footer">
<li><a href="#!"><i class="fab fa-facebook"></i></a></li>
<li><a href="#!"><i class="fab fa-twitter-square"></i></a></li>
<li><a href="#!"><i class="fab fa-instagram"></i></a></li>
<li><a href="#!"><i class="fab fa-linkedin"></i></a></li>
</ul>
</div>
</div>
</div>
<div class="col-lg-2 offset-lg-1 col-md-6 col-sm-6 col-12">
<div class="footer_heading_area">
<h5>Company</h5>
</div>
<div class="footer_link_area">
<ul>
<li><a href="about.html">About Us</a></li>
<li><a href="testimonials.html">Testimonials</a></li>
<li><a href="faqs.html">Rewards</a></li>
<li><a href="terms-service.html">Work with Us</a></li>
<li><a href="tour-guides.html">Meet the Team </a></li>
<li><a href="news.html">Blog</a></li>
</ul>
</div>
</div>
<div class="col-lg-2 col-md-4 col-sm-6 col-12">
<div class="footer_heading_area">
<h5>Support</h5>
</div>
<div class="footer_link_area">
<ul>
<li><a href="dashboard.html">Account</a></li>
<li><a href="faq.html">Faq</a></li>
<li><a href="testimonials.html">Legal</a></li>
<li><a href="contact.html">Contact</a></li>
<li><a href="top-destinations.html"> Affiliate Program</a></li>
<li><a href="privacy-policy.html">Privacy Policy</a></li>
</ul>
</div>
</div>
<div class="col-lg-2 col-md-4 col-sm-6 col-12">
<div class="footer_heading_area">
<h5>Other Services</h5>
</div>
<div class="footer_link_area">
<ul>
<li><a href="top-destinations-details.html">Community program</a></li>
<li><a href="top-destinations-details.html">Investor Relations</a></li>
<li><a href="flight-search-result.html">Rewards Program</a></li>
<li><a href="room-booking.html">PointsPLUS</a></li>
<li><a href="testimonials.html">Partners</a></li>
<li><a href="hotel-search.html">List My Hotel</a></li>
</ul>
</div>
</div>
<div class="col-lg-2 col-md-4 col-sm-6 col-12">
<div class="footer_heading_area">
<h5>Top cities</h5>
</div>
<div class="footer_link_area">
<ul>
<li><a href="room-details.html">Chicago</a></li>
<li><a href="hotel-details.html">New York</a></li>
<li><a href="hotel-booking.html">San Francisco</a></li>
<li><a href="tour-search.html">California</a></li>
<li><a href="tour-booking.html">Ohio </a></li>
<li><a href="tour-guides.html">Alaska</a></li>
</ul>
</div>
</div>
</div>
</div>
</footer>
<div class="copyright_area">
<div class="container">
<div class="row align-items-center">
<div class="co-lg-6 col-md-6 col-sm-12 col-12">
<div class="copyright_left">
<p>Copyright © 2022 All Rights Reserved</p>
</div>
</div>
<div class="co-lg-6 col-md-6 col-sm-12 col-12">
<div class="copyright_right">
<img src="{{asset('public/frontend/assets/img/common/cards.png')}}" alt="img">
</div>
</div>
</div>
</div>
</div>
<div class="go-top">
<i class="fas fa-chevron-up"></i>
<i class="fas fa-chevron-up"></i>
</div>

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




@endsection
@extends('master')

@section('homeContent')
<!-- ##### Breadcrumb Area Start ##### -->
<div class="breadcrumb-area">
<!-- Top Breadcrumb Area -->
<div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url(img/bg-img/24.jpg);">
<h2>SHOP DETAILS</h2>
</div>

<div class="container">
<div class="row">
<div class="col-12">
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
<li class="breadcrumb-item"><a href="#">Shop</a></li>
<li class="breadcrumb-item active" aria-current="page">Shop Details</li>
</ol>
</nav>
</div>
</div>
</div>
</div>
<!-- ##### Breadcrumb Area End ##### -->
<!-- ##### Single Product Details Area Start ##### -->
<section class="single_product_details_area mb-50">
<div class="produts-details--content mb-50">
<div class="container">
<div class="row justify-content-between">

<div class="col-12 col-md-6 col-lg-5">
<div class="single_product_thumb">
<div id="product_details_slider" class="carousel slide" data-ride="carousel">
<div class="carousel-inner">
@foreach($moreimg as $moreimgslide)
<div class="carousel-item @if($loop->first) active @endif">
<a class="product-img" href="" title="Product Image">
<img class="d-block w-100" src="{{asset('uploads/moreimg/'.$moreimgslide->moreimg)}}" alt="1">
</a>
</div>
@endforeach

</div>
<ol class="carousel-indicators">

@foreach($moreimg as $moreimgind)	
<li class="@if($loop->first) active @endif" data-target="#product_details_slider" data-slide-to="0" style="background-image: url({{asset('uploads/moreimg/'.$moreimgind->moreimg)}})">
</li>

@endforeach   
</ol>
</div>
</div>
</div>

<div class="col-12 col-md-6">
<div class="single_product_desc">
<h4 class="title">{{$product->name}}</h4>
<h4 class="price">${{$product->price}}</h4>
<div class="short_overview">
<p>{{$product->description}}</p>
</div>

<div class="cart--area d-flex flex-wrap align-items-center">
<!-- Add to Cart Form -->
<form action="{{url('/cart/addtocart')}}" class="cart clearfix d-flex align-items-center" method="post">
@csrf
<div class="quantity">
<span class="qty-minus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i class="fa fa-minus" aria-hidden="true"></i></span>
<input type="number" class="qty-text" id="qty" step="1" min="1" max="50" name="quantity" value="1">
<span class="qty-plus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="fa fa-plus" aria-hidden="true"></i></span>
</div>
<input type="hidden" name="pid" value="{{$product->id}}">
<button type="submit" name="addtocart"  class="btn alazea-btn ml-15">Add to cart</button>
</form>
<!-- Wishlist & Compare -->
<div class="wishlist-compare d-flex flex-wrap align-items-center">

@if(Auth::check())

@php
$checkclicked=App\Lovelist::where('pid',$product->id)->where('uid',Auth::user()->id)->first();
@endphp  

@if(!empty($checkclicked))
<a href="javascript:void(0)" class="wishlist-btn ml-15"><i style="color:red" class="icon_heart_alt"></i></a>
@else
<a href="javascript:void(0)" id="abc"  onclick="saveLove()" class="wishlist-btn ml-15"><i id="added" class="icon_heart_alt"></i></a>
@endif

@else
<a href="javascript:void(0)" class="wishlist-btn ml-15"><i class="icon_heart_alt"></i></a>

@endif



<a href="#" class="compare-btn ml-15"><i class="arrow_left-right_alt"></i></a>
</div>
</div>

<div class="products--meta">
<p><span>SKU:</span> <span>{{$product->code}}</span></p>
<p><span>Category:</span> <span>{{$product->category}}</span></p>
<p><span>Tags:</span> <span>{{$product->tags}} </span></p>
<p>
<span>Share on:</span>
<span>
<a href="#"><i class="fa fa-facebook"></i></a>
<a href="#"><i class="fa fa-twitter"></i></a>
<a href="#"><i class="fa fa-pinterest"></i></a>
<a href="#"><i class="fa fa-google-plus"></i></a>
</span>
</p>
</div>

</div>
</div>
</div>
</div>
</div>

<div class="container">
<div class="row">
<div class="col-12">
<div class="product_details_tab clearfix">
<!-- Tabs -->
<ul class="nav nav-tabs" role="tablist" id="product-details-tab">
<li class="nav-item">
<a href="#description" class="nav-link active" data-toggle="tab" role="tab">Description</a>
</li>
<li class="nav-item">
<a href="#addi-info" class="nav-link" data-toggle="tab" role="tab">Additional Information</a>
</li>
<li class="nav-item">
<a href="#reviews" class="nav-link" data-toggle="tab" role="tab">Reviews <span class="text-muted">(1)</span></a>
</li>
</ul>
<!-- Tab Content -->
<div class="tab-content">
<div role="tabpanel" class="tab-pane fade show active" id="description">
<div class="description_area">
<p>Sed a facilisis orci. Curabitur magna urna, varius placerat placerat sodales, pretium vitae orci. Aliquam erat volutpat. Cras sit amet suscipit magna. Quisque turpis odio, facilisis vel eleifend eu, dignissim ac odio.</p>
<p>Interdum et malesuada fames ac ante ipsum primis in faucibus. In scelerisque augue at the moment mattis. Proin vitae arcu sit amet justo sollicitudin tincidunt sit amet ut velit.Proin placerat vel augue eget euismod. Phasellus cursus orci eu tellus vestibulum, vestibulum urna accumsan. Vestibulum ut ullamcorper sapien. Pellentesque molestie, est ac vestibulum eleifend, lorem ipsum mollis ipsum.</p>
</div>
</div>
<div role="tabpanel" class="tab-pane fade" id="addi-info">
<div class="additional_info_area">
<p>What should I do if I receive a damaged parcel?
<br> <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit impedit similique qui, itaque delectus labore.</span></p>
<p>I have received my order but the wrong item was delivered to me.
<br> <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis quam voluptatum beatae harum tempore, ab?</span></p>
<p>Product Receipt and Acceptance Confirmation Process
<br> <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum ducimus, temporibus soluta impedit minus rerum?</span></p>
<p>How do I cancel my order?
<br> <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum eius eum, minima!</span></p>
</div>
</div>
<div role="tabpanel" class="tab-pane fade" id="reviews">
<div class="reviews_area">
<ul>
<li>
<div class="single_user_review mb-15">
<div class="review-rating">
    <i class="fa fa-star" aria-hidden="true"></i>
    <i class="fa fa-star" aria-hidden="true"></i>
    <i class="fa fa-star" aria-hidden="true"></i>
    <i class="fa fa-star" aria-hidden="true"></i>
    <i class="fa fa-star" aria-hidden="true"></i>
    <span>for Quality</span>
</div>
<div class="review-details">
    <p>by <a href="#">Colorlib</a> on <span>12 Sep 2018</span></p>
</div>
</div>
<div class="single_user_review mb-15">
<div class="review-rating">
    <i class="fa fa-star" aria-hidden="true"></i>
    <i class="fa fa-star" aria-hidden="true"></i>
    <i class="fa fa-star" aria-hidden="true"></i>
    <i class="fa fa-star" aria-hidden="true"></i>
    <i class="fa fa-star" aria-hidden="true"></i>
    <span>for Design</span>
</div>
<div class="review-details">
    <p>by <a href="#">Colorlib</a> on <span>12 Sep 2018</span></p>
</div>
</div>
<div class="single_user_review">
<div class="review-rating">
    <i class="fa fa-star" aria-hidden="true"></i>
    <i class="fa fa-star" aria-hidden="true"></i>
    <i class="fa fa-star" aria-hidden="true"></i>
    <i class="fa fa-star" aria-hidden="true"></i>
    <i class="fa fa-star" aria-hidden="true"></i>
    <span>for Value</span>
</div>
<div class="review-details">
    <p>by <a href="#">Colorlib</a> on <span>12 Sep 2018</span></p>
</div>
</div>
</li>
</ul>
</div>

<div class="submit_a_review_area mt-50">
<h4>Submit A Review</h4>
<form action="#" method="post">
<div class="row">
<div class="col-12">
<div class="form-group d-flex align-items-center">
    <span class="mr-15">Your Ratings:</span>
    <div class="stars">
        <input type="radio" name="star" class="star-1" id="star-1">
        <label class="star-1" for="star-1">1</label>
        <input type="radio" name="star" class="star-2" id="star-2">
        <label class="star-2" for="star-2">2</label>
        <input type="radio" name="star" class="star-3" id="star-3">
        <label class="star-3" for="star-3">3</label>
        <input type="radio" name="star" class="star-4" id="star-4">
        <label class="star-4" for="star-4">4</label>
        <input type="radio" name="star" class="star-5" id="star-5">
        <label class="star-5" for="star-5">5</label>
        <span></span>
    </div>
</div>
</div>
<div class="col-12 col-md-6">
<div class="form-group">
    <label for="name">Nickname</label>
    <input type="email" class="form-control" id="name" placeholder="Nazrul">
</div>
</div>
<div class="col-12 col-md-6">
<div class="form-group">
    <label for="options">Reason for your rating</label>
    <select class="form-control" id="options">
          <option>Quality</option>
          <option>Value</option>
          <option>Design</option>
          <option>Price</option>
          <option>Others</option>
    </select>
</div>
</div>
<div class="col-12">
<div class="form-group">
    <label for="comments">Comments</label>
    <textarea class="form-control" id="comments" rows="5" data-max-length="150"></textarea>
</div>
</div>
<div class="col-12">
<button type="submit" class="btn alazea-btn">Submit Your Review</button>
</div>
</div>
</form>
</div>
</div>

</div>
</div>
</div>
</div>
</div>
</section>
<!-- ##### Single Product Details Area End ##### -->



@endsection


@section('cusjs')

<script>
   function saveLove(){

    $.ajax({
           type:'GET',
           url:'/addtolist/'+<?php echo $product->id ?>,
           success:function(response) {
              $('#abc').removeAttr('onclick');
              $('#added').css('color','red');
           },
           error:function(){

           },
        });



    }

</script>

@endsection

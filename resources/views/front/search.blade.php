@extends('master')

@section('homeContent')
    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="breadcrumb-area">
        <!-- Top Breadcrumb Area -->
        <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url({{asset('lib/img/bg-img/24.jpg')}});">
    </div>

<div class="container mt-5">
	@if(count($searchpro) > 0)
	<h1>{{count($searchpro)}} item found in "{{$keyword}}"</h1>
	 <div class="row">
                @foreach($searchpro as $product)
                <!-- Single Product Area -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-product-area mb-50 wow fadeInUp" data-wow-delay="100ms">
                        <!-- Product Image -->
                        <div class="product-img">
                            <a href="{{url('product-details-'.$product->id)}}"><img src="{{asset('uploads/'.$product->thum_img)}}" style="height: 350px" alt=""></a>
                            <!-- Product Tag -->
                            <div class="product-tag">
                                <a href="#">{{$product->type}}</a>
                            </div>
                            <div class="product-meta d-flex">
                                <a href="#" class="wishlist-btn"><i class="icon_heart_alt"></i></a>
                                <a href="cart.html" class="add-to-cart-btn">Add to cart</a>
                                <a href="#" class="compare-btn"><i class="arrow_left-right_alt"></i></a>
                            </div>
                        </div>
                        <!-- Product Info -->
                        <div class="product-info mt-15 text-center">
                            <a href="shop-details.html">
                                <p>{{$product->name}}</p>
                            </a>
                            <h6>${{$product->price}}</h6>
                        </div>
                    </div>
                </div>

                @endforeach
              </div>
              @else
              <h1>Search result not found!</h1>
              @endif

</div>


@endsection

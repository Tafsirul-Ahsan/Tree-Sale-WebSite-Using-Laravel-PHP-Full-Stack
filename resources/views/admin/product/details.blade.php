@extends('admin.master')

@section('homeContent')

     <div class="card">
	    <div class="card-body">
	        <h5 class="card-title m-b-0">Product details </h5>
	    </div>
	    <table class="table table-borderless">
		  <tbody>
		    <tr>
		      <th scope="row">Name</th>
		      <td>{{$product->name}}</td>
		    </tr>
		    <tr>
		      <th scope="row">Code</th>
		      <td>{{$product->code}}</td>
		    </tr>
		    <tr>
		      <th scope="row">Quantity</th>
		      <td>{{$product->qty}}</td>
		    </tr>
		    <tr>
		      <th scope="row">Type</th>
		      <td>{{$product->type}}</td>
		    </tr>
		    <tr>
		      <th scope="row">Short Description</th>
		      <td>{{$product->short_des}}</td>
		    </tr>
		    <tr>
		      <th scope="row">Category</th>
		      <td>{{$product->category}}</td>
		    </tr>
		    <tr>
		      <th scope="row">Tags</th>
		      <td>{{$product->tags}}</td>
		    </tr>
		    <tr>
		      <th scope="row">Price</th>
		      <td>{{$product->price}}</td>
		    </tr>
		    <tr>
		      <th scope="row">Thum image</th>
		      <td><img width="100" src="{{asset('/uploads/'.$product->thum_img)}}" alt=""></td>
		    </tr>
		    <tr>
			@php
			$moreimg=App\Moreimg::where('pid',$product->id)->get();	
			@endphp
		      <th scope="row">More image</th>
		      <td>
				@foreach($moreimg as $moreimg)
		      	<img width="100" src="{{asset('/uploads/moreimg/'.$moreimg->moreimg)}}" alt="">
                @endforeach
		      </td>
		    </tr>

		  </tbody>
		</table>

	 
	</div>

@endsection


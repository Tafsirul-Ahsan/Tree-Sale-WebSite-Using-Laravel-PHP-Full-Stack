@extends('admin.master')

@section('homeContent')

     <div class="card">
@if(session()->has('success'))
<div class="alert alert-success alert-dismissible fade show m-5" role="alert">
  <strong>Success!</strong> {{session()->get('success')}}.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
     	
	    <div class="card-body">
	        <h5 class="card-title m-b-0">Static Table  <a href="{{url('admin/products/create ')}}" class="btn btn-secondary">Add New Product</a></h5>
	    </div>

	    <table class="table">
	          <thead>
	            <tr>
	              <th scope="col">Image</th>
	              <th scope="col">Name</th>
	              <th scope="col">Quantity</th>
	              <th scope="col">Sub Total</th>
	              <th scope="col">Customer</th>
	              <th scope="col">Date</th>
	              <th scope="col">Status</th>
	              <th scope="col">Action</th>
	            </tr>
	          </thead>
	          <tbody>
	          	@foreach($orders as $order)

	          	@php
	          		$product=App\Product::where('id',$order->pid)->first();
	          		$user=App\User::where('id',$order->uid)->first();
	          	@endphp
	            <tr>
	              <td>  
	              	<img width="40" src="{{asset('/uploads/'.$product->thum_img)}}" alt="">  </td>
	              <td>{{$product->name}}</td>
	              <td>{{$order->quantity}}</td>
	              <td>{{$order->subtotal}}</td>
	              <td>{{$user->name}}</td>
	              <td>{{date('d-m-Y',strtotime($order->created_at))}}</td>
	              <td>
	              	@if($order->status==0)
	              	<b class="text-danger">Pending</b>
	              	@else
	              	<b class="text-success">Completed</b>
	              	@endif
	              </td>
	              <td>
	              	<a href="{{url('admin/orders/'.$order->id)}}" class="btn btn-outline-success btn-sm rounded shadow"> <i class="fa fa-check"></i></a>
	              	
	              	<a href="javascript:void(0)" onclick="document.getElementById('deleteform').submit()" class="btn btn-outline-danger btn-sm rounded shadow"> <i class="fa fa-trash"></i></a>
	              	<form method="post" id="deleteform" action="{{url('admin/orders/'.$order->id)}}">
	              		@csrf
	              		@method('DELETE')
	              	</form>
	              </td>
	            </tr>
	           @endforeach
	          </tbody>
	    </table>
	</div>

@endsection


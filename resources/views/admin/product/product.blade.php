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
	              <th scope="col">Price</th>
	              <th scope="col">Action</th>
	            </tr>
	          </thead>
	          <tbody>
	          	@foreach($products as $product)
	            <tr>
	              <td>  <img width="40" src="{{asset('/uploads/'.$product->thum_img)}}" alt="">  </td>
	              <td>{{$product->name}}</td>
	              <td>{{$product->qty}}</td>
	              <td>{{$product->price}}</td>
	              <td>
	              	<a href="{{url('admin/products/'.$product->id)}}" class="btn btn-outline-success btn-sm rounded shadow"> <i class="fa fa-eye"></i></a>
	              	<a href="{{url('admin/products/'.$product->id.'/edit')}}" class="btn btn-outline-info btn-sm rounded shadow"> <i class="fa fa-edit"></i></a>
	              	<a href="javascript:void(0)" onclick="document.getElementById('deleteform').submit()" class="btn btn-outline-danger btn-sm rounded shadow"> <i class="fa fa-trash"></i></a>
	              	<form method="post" id="deleteform" action="{{url('admin/products/'.$product->id)}}">
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


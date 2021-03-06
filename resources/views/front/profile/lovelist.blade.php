@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">Love List</div>

                <div class="card-body">
                    <table class="table table-hover">
                  <thead>
                    <tr>
                      <th scope="col">Image</th>
                      <th scope="col">Name</th>
                      <th scope="col">Price</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                 @foreach($lovelists as $lovelist)
                 @php
                 $product=App\Product::where('id',$lovelist->pid)->first()
                 @endphp   
                    <tr>
                      <td><img width="50" src="{{asset('/uploads/'. $product->thum_img)}}" alt=""></td>
                      <td><a href="{{url('/product-details-'.$product->id)}}">{{$product->name}}</a></td>
                      <td>{{$product->price}}</td>
                      <td>@mdo</td>
                    </tr>
                   @endforeach 
                    
                  </tbody>
                </table>
                    


                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')

<h1 class="text-center mt-2">All Products</h1>
<hr>
<br>


<div class="container">
<pre><a href="{{ route('home') }}" class="btn btn-success">Go Menu Page</a><br>
<form class="d-flex" action="{{ route('product.viewsearch') }}" method="GET">
  <input class="form-control me-2" type="search" name="search" value="{{ Request::get('search') }}" placeholder="Search" aria-label="Search">
  <button class="btn btn-outline-success" type="submit">Search</button>
</form></pre>
    <div class="row">
    @foreach ($adminshowallproducts as $product)
        <div class="col-md-3" style="display:flex">
            
            <div class="card m-2 p-2" style="width: 18rem;">
            <!-- <img src="images/{{ $product->picture }}" class="card-img-top" alt="..."> -->
                <img src="/images/{{ $product->picture }}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">{{ $product->productname }}</h5>
                  <h5 class="card-title">Price: Rs.{{ $product->price }}</h5>
                  <hr>
                  <!-- <p class="card-text">{{ $product->description}} </p> -->
                  
                  <form action="{{ route('admin.product.delete', $product->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <!-- @method('DELETE') This is a method that allows you to delete data from the database -->
                    <pre><a href="{{ route('admin.adminshow', $product->id) }}" class="btn btn-primary">View Details</a> <button type="submit" class="btn btn-danger">Delete</button></pre>
                  </form>
                </div>
              </div>
           
        </div>
        @endforeach
    </div>
</div>


@endsection

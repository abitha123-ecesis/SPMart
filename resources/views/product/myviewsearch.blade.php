@extends('layouts.app')

@section('content')

<h1 class="text-center mt-2"><a href="{{ route('product.myview') }}" class=""><img src="{{url('/images/backarrow.png')}}" alt="Logo Image" width="100px" height="100px"/></a>Search Results</h1>
<hr>
<br>


<div class="container">
<pre><a href="{{ route('home') }}" class="btn btn-success">Go Menu Page</a><br>
<form class="d-flex" action="{{ route('product.myviewsearch') }}" method="GET">
  <input class="form-control me-2" type="mysearch" name="mysearch" value="{{ Request::get('mysearch') }}" placeholder="Search" aria-label="Search">
  <button class="btn btn-outline-success" type="submit">Search</button>
</form></pre>
    <div class="row">
    @foreach ($mysearchproduct as $product)
        <div class="col-md-3" style="display:flex">
            
            <div class="card m-2 p-2" style="width: 18rem;">
            <!-- <img src="images/{{ $product->picture }}" class="card-img-top" alt="..."> -->
                <img src="/images/{{ $product->picture }}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">{{ $product->productname }}</h5>
                  <h5 class="card-title">Price: Rs.{{ $product->price }}</h5>
                  <hr>
                  <!-- <p class="card-text">{{ $product->description}} </p> -->
                  <a href="{{ route('product.show', $product->id) }}" class="btn btn-primary">View Details</a>
                </div>
              </div>
            
        </div>
        @endforeach
    </div>
</div>


@endsection

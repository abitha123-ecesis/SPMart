@extends('layouts.app')

@section('content')

<div class="container mt-5 mb-5">

    <h2>Create Product</h2>
    <hr>

    <form action="{{ route('product.store') }}" enctype="multipart/form-data" method="POST">
        @csrf
        <input type="hidden" id="email_id" name="email_id" value="{{ Auth::user()->email }}">
        <input type="hidden" id="userid" name="userid" value="{{ Auth::user()->id }}">

        <div class="mb-3">
            <label for="productname" class="form-label">Product Name</label>
            <input type="text" class="form-control" name="productname" id="productname" placeholder="Enter product name">
        </div>

        <!-- <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" name="email" id="email" placeholder="" value="{{ Auth::user()->email }}">
        </div> -->
        
        <div class="mb-3">
            <label for="productdescription" class="form-label">Product Description</label>
            <input type="text" class="form-control" name="productdescription" id="productdescription" placeholder="Enter product description">
        </div>

        <div class="mb-3">
            <label for="productquantity" class="form-label">Product Quantity</label>
            <input type="text" class="form-control" name="productquantity" id="productquantity" placeholder="Enter product quantity">
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="text" class="form-control" name="price" id="price" placeholder="Enter price">
          </div>

        <div class="mb-3">
            <label for="picture" class="form-label">Choose Picture</label>
            <input class="form-control" type="file" name="picture" id="picture">
          </div>


          <button type="submit" class="btn btn-primary">Create Product</button>

    </form>

</div>


@endsection
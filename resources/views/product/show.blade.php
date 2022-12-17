@extends('layouts.app')

@section('content')

<h1 class="text-center mt-2"><a href="{{ route('product.view') }}" class=""><img src="{{url('/images/backarrow.png')}}" alt="Logo Image" width="100px" height="100px"/></a>{{ $showproduct->productname }} | Detail</h1>
<hr>
<br>


<div class="container">
    <div class="row">
      <div class="col-md-8" style="display:flex">

            <div class="container m-2 p-2">
                <img src="/images/{{ $showproduct->picture }}" height="450px" alt="...">
                <div class="container m-2 p-2">
                  
                  
                  <h2>Price: Rs.{{ $showproduct->price }}</h2>
                  <h5>Quantity: {{ $showproduct->productquantity }}</h5>
                  <hr>
                  <p>{{ $showproduct->productdescription }}</p>
                  <a href="{{ route('home') }}" class="btn btn-success">Go Menu Page</a>
                  <!-- <a href="" class="btn btn-primary">Enquiry</a> -->
                </div>
              </div>
        </div>
      </div>

      {{-- //Next Column --}}

            <div class="col-md-4">
             <div class="container">
                <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Enquiry
  </button>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{ $showproduct->productname }}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
    <form action="{{ route('enquiry.store') }}" method="POST">
        @csrf
        <div class="modal-body">

            <div class="mb-3">
                <input type="hidden" class="form-control" name="product_id" id="product_id" value="{{ $showproduct->id }}" >
                <input type="hidden" class="form-control" name="user_email" id="user_email" value="{{ Auth::user()->email }}" >
            </div>

            <div class="mb-3">
                  <label for="enquiry" class="form-label">Product Name</label>
                  <input type="text" class="form-control" name="product_name" id="product_name" value="{{ $showproduct->productname }}" >
                  <label for="enquiry" class="form-label">Enquiry</label>
                  <textarea type="message-text" name="enquiry" class="form-control" id="enquiry" ></textarea>

            </div>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Send</button>
        </div>
    </form>
      </div>
    </div>
  </div>
            </div>

            <div class="container mt-3">
                <h3>All Enquiries</h3>
                        @php
                            $count = 1;
                        @endphp
                <div>
                @if (is_array($showproduct->enquiries) || is_object($showproduct->enquiries))
                    @foreach ($showproduct->enquiries as $enquiry )
                       
                        <div class="mb-2">
                            <!-- <h4>Query sender</h4> -->
                            <h4>{{ $count++ }}. {{ $enquiry->user_email }}</h4>
                            <h6>{{ $enquiry->enquiry }}</h6>
                            <hr>
                        </div>
                    @endforeach
                @endif
                </div>
            </div>
            </div>


    </div>
</div>





@endsection
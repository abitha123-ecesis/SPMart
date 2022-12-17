@extends('layouts.app')

@section('content')

<h1 class="text-center mt-2"><a href="{{ route('admin.adminview') }}" class=""><img src="{{url('/images/backarrow.png')}}" alt="Logo Image" width="100px" height="100px"/></a>{{ $adminshowproduct->productname }} | Detail</h1>
<hr>
<br>


<div class="container">
    <div class="row">
      <div class="col-md-8" style="display:flex">

            <div class="container m-2 p-2">
                <img src="/images/{{ $adminshowproduct->picture }}" height="450px" alt="...">
                <div class="container m-2 p-2">
                  
                  
                  <h2>Price: Rs.{{ $adminshowproduct->price }}</h2>
                  <h5>Quantity: {{ $adminshowproduct->productquantity }}</h5>
                  <hr>
                  <p>{{ $adminshowproduct->productdescription }}</p>
                  <a href="{{ route('home') }}" class="btn btn-success">Go Menu Page</a>
                  <!-- <a href="" class="btn btn-primary">Enquiry</a> -->
                </div>
              </div>
        </div>
      </div>

      {{-- //Next Column --}}

  
            <div class="container mt-3">
                <h3>All Enquiries</h3>
                        @php
                            $count = 1;
                        @endphp
                <div>
                @if (is_array($adminshowproduct->enquiries) || is_object($adminshowproduct->enquiries))
                    @foreach ($adminshowproduct->enquiries as $enquiry )
                       
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


@extends('layouts.app')

@section('content')
<div class="container">
<section class="hero-banner">
      <div class="container">
        <div class="row no-gutters align-items-center pt-60px">
          <div class="col-5 d-none d-sm-block">
            <div class="hero-banner__img">
              <img class="img-fluid" src="{{url('/images/hero-banner.png')}}" alt="" style="position:absolute; height:400px; width:470px; top: -200px; left:30px">
            </div>
          </div>
          <div class="col-sm-7 col-lg-6 offset-lg-1 pl-4 pl-md-5 pl-lg-0">
            <div class="hero-banner__content">
              <h4>Welcome,
              {{ Auth::user()->firstname }}
              </h4>
              <h1>Big Sale</h1>
              <p>Don't miss the deal</p>
              <a class="button button-hero" href="{{ route('product.create') }}" style="position:absolute; left:600px;">Add Products</a><br><br><br>
              <a class="button button-hero" href="{{ route('admin.adminview') }}" style="position:absolute; left:650px;">View Products</a><br><br><br>
              <a class="button button-hero" href="{{ route('product.myview') }}" style="position:absolute; left:700px;">My Products</a>
            </div>
          </div>
        </div>
      </div>
    </section>
</div>
@endsection

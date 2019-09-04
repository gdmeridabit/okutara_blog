@extends('layouts.app')

@section('content')
<div class="content" id="outer">
  <div class="home-top-video">
    <video autoplay loop muted width="100%">
      <source src="https://okutara.s3-ap-northeast-1.amazonaws.com/Okutara_home.mp4" type="video/mp4"/>
    </video>
    <div class="home-text home-logo">
      <img src="https://okutara.s3-ap-northeast-1.amazonaws.com/logo1_white.png"/>
    </div>
  </div>
</div>
</div>
@if(isset($posts))
<div class="justify-content-center text-center">
<h1>Featured Article</h1>
    @foreach($posts as $item)
    <div class="card" style="">
    <div class="row" style="height: 200px; width: 100%; object-fit: cover; background-position: left; background: linear-gradient(to right, rgba(255, 255, 255, 0) 0, rgb(255, 255, 255) 70%, rgba(255, 255, 255, 1) 290px), url({{asset('storage/files/'. $item->filename)}}) center center no-repeat; background-size: cover;">
        <!-- <div class="col-6">
        <img src="{{asset('storage/files/'. $item->filename)}}" width="50%" class="featured-container">
        </div> -->
        <div class="col-md-6 offset-md-6">
            <div class="card-body text-right">
                <h4 class="card-title text-primary">{{ $item->title }}</h4>
                <p>{{ $item->created_at }}</p>
                <p class="card-text">{{ $item->description }}</p>
            </div>
        </div>
    </div>   
    </div>
    @endforeach
</div>

@endif
@endsection

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
<div class="container">
    <div class="px-5 mt-3 justify-content-center text-center">
    <h1>Featured Article</h1>
        @foreach($posts as $item)
        <div class="card">
        <div class="row">
            <div class="col-6">
            <img src="{{asset('storage/files/'. $item->filename)}}" width="50%">
            </div>
            <div class="col-6">
                <div class="card-body">
                    <h4 class="card-title text-primary">{{ $item->title }}</h4>
                    <p>{{ $item->created_at }}</p>
                    <p class="card-text">{{ $item->description }}</p>
                </div>
            </div>
        </div>   
        </div>
        @endforeach
    </div>
</div>
@endif
@endsection

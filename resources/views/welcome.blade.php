@extends('layouts.app')

@section('content')
<div class="content" id="outer">
  <div class="home-top-video">
    <video autoplay loop muted width="100%">
      <source src="https://okutara.s3-ap-northeast-1.amazonaws.com/Okutara_main2.mp4" type="video/mp4"/>
    </video>
    <div class="home-text home-logo">
      <img src="https://okutara.s3-ap-northeast-1.amazonaws.com/logo1_white.png"/>
      <br/>
      <a href="" style="z-index: 100; position: absolute; color:white">
        <i class="fas fa-play"></i>
      </a>
    </div>
  </div>
</div>
</div>
<div class="container">

    <div class="px-5 mt-3 justify-content-center text-center">
    <h1>Featured Article</h1>
        <div class="card">
        <div class="row">
            <div class="col-6">
            <img src="{{ $image }}" width="100%">
            </div>
            <div class="col-6">
                <div class="card-body">
                    <h4 class="card-title text-primary">{{ $posts->title }}</h4>
                    <p>{{ $posts->created_at }}</p>
                    <p class="card-text">{{ $posts->description }}</p>
                </div>
            </div>
        </div>   
        </div>
    </div>

</div>
@endsection

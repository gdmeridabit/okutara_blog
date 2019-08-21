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
<div class="container" style="margin: 0 30px">
  @foreach ($posts as $data)
  <div class="px-5 mt-3 justify-content-center">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title text-primary">{{ $data->title }}</h4>
        <p>{{ $data->created_at }}</p>
        <p class="card-text">{{ $data->description }}</p>
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection

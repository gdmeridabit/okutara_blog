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
<div class="my-5">
  <span class="featured-title">
    <span class="font-weight-bold">Featured</span><span class="font-weight-light">Articles</span>
  </span>
</div>
@foreach($posts as $item)
<a href="/post/{{ $item->id}}" class="card-link title-card" >
<div class="card featured-blog" style="">
<div class="row featured-container" style="background: linear-gradient(to right, rgba(255, 255, 255, 0) 0, rgb(255, 255, 255) 70%, rgba(255, 255, 255, 1) 290px), url({{asset('storage/files/'. $item->filename)}}) center center no-repeat; background-size: cover">
    <div class="col-md-10 offset-md-2">
        <div class="card-body text-right py-5">
            <h4 class="card-title featured-blog__title">{{ $item->title }}</h4>
            <span class="featured-blog__subtitle">
              {{ $item->created_at }}
              <br />
              {{ $item->user->name }}
            </span>
        </div>
    </div>
</div>   
</div>
</a>
@endforeach
<div class="row my-5">
  <div class="col-md-12">
    <a class="btn featured-share" href="{{ route('create') }}">Share your <span style="color: rgb(27, 27, 27)">Okutama experience</span></a>
  </div>
</div>
<div class="my-5">
  <span class="featured-title">
    <span class="font-weight-bold">About</span><span class="font-weight-light">Us</span>
  </span>
 </div>
<div class="row">    
    <div class="col-md-4">
    <img src="{{asset('img/okutara_black.png')}}" style="padding-left:120px;width:78%"/>
    </div> 
    <div class="col-md-8">
    <p style="text-align:left;padding-right:150px;line-height:19px;font-size:1em" class="lead">
    As international students of Okutama Japanese Language School, we had the privilege to live and experience Okutama in a span of one and a half year. Originally coming from overseas, we had had no idea that a countryside like Okutama exists within Tokyo until we saw it ourselves. During our stay, we were able to interact with the locals and be personally involved in the activities of Okutama. This opportunity made us appreciate the beauty of Okutama and its culture even more. We believe that for travellers eyeing for a unique experience in Tokyo, Okutama is definitely a must visit.
      <br/> <br/>
    Through Okutara, we aim to share our own experience in Okutama through blogs/vlogs so that people from overseas can vividly see the beauty of Okutama the way we see it. As students, we would like to contribute to the promotion of Okutama in the hopes that people would possibly plan their own trip to Okutama.
    </p>
    </span>
  </div>
</div>
</div>
<br/>
<br/>
<div class="row">
<div class="col-md-4" style="padding-left:120px;text-align:center">
<img src="{{asset('img/gwen_pic.jpg')}}" class="rounded-circle mx-auto d-block" style="width:50%">
<br/>
<b>Gwen Merida</b>
<br/>
Software Developer
</div>

<div class="col-md-4" style="text-align:center">
<img src="{{asset('img/jp_pic.jpg')}}" class="rounded-circle mx-auto d-block" style="width:38%">
<br/>
<b>JP Salvacion</b>
<br/>
UX Designer / Content Director
</div>

<div class="col-md-4" style="padding-right:120px;text-align:center">
<img src="{{asset('img/mica_pic.jpg')}}" class="rounded-circle mx-auto d-block" style="width:50%">
<br/>
<b>Mica Delmonte</b>
<br/>
Frontend Developer
</div>
</div>

@endif
@endsection


@extends('layouts.app')

@section('content')
<div class="content" id="outer">
    <div class="home-top-video">
        <video autoplay loop muted width="100%" style="height: 100vh !important; object-fit: cover;">
            <source src="{{asset('img/Okutara_home.mp4')}}" type="video/mp4"/>
        </video>
        <div class="home-text home-logo">
            <img src="{{asset('img/logo1_white.png')}}"/>
        </div>
        <div style="position: absolute; transform: translate(-50%, -50%); color: #fff; z-index: 10; left: 50%; top: 93%;">
            <i class="fas fa-chevron-down mr-2"></i>
            <br />
            <span style="font-size: 10px; letter-spacing: 3px;">SCROLL DOWN</span>
        </div>
    </div>
</div>
</div>
@if(isset($posts))
<div class="justify-content-center text-center">
    <div class="my-5 pt-5">
    <span class="featured-title">
      <span class="font-weight-bold">Featured</span><span class="font-weight-light">Blogs</span>
    </span>
    </div>
    @foreach($posts as $item)
    <a href="/post/{{ $item->id}}">
        <div class="card featured-blog" style="">
            <div class="d-flex flex-row featured-container"
                 style="background: linear-gradient(to right, rgba(255, 255, 255, 0) 0, rgb(255, 255, 255) 70%, rgba(255, 255, 255, 1) 290px), url({{asset('storage/files/'. $item->filename)}}) center center no-repeat; background-size: cover">
                <div class="col-md-10 offset-md-2">
                    <div class="card-body text-right py-5">
                        <h4 class="card-title featured-blog__title">{{ $item->title }}</h4>
                        <span class="featured-blog__subtitle">
                {{ date( "F d, Y", strtotime($item->created_at)) }}
                <br/>
                {{ $item->user->name }}
              </span>
                    </div>
                </div>
            </div>
        </div>
    </a>
    @endforeach
    <div class="row my-5">
        <div class="col-sm-0 col-md-2">
        </div>
        <div class="col-sm-12 col-md-4 my-3">
            <a class="btn featured-seemore" href="{{ route('categories') }}">
                See More
                <span style="color: rgb(27, 27, 27)">Okutama attractions</span>
            </a>
        </div>
        <div class="col-sm-12 col-md-4 my-3">
            <a class="btn featured-share" href="{{ route('create') }}">
                Share your
                <span style="color: rgb(27, 27, 27)">Okutama experience</span>
            </a>
        </div>
        <div class="col-sm-0 col-md-2">

        </div>
    </div>
    <div style="background-color: white; padding-bottom: 30px">
        <div class="my-5 pt-5">
        <span class="featured-title">
            <span class="font-weight-bold">About</span><span class="font-weight-light">Us</span>
        </span>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                <img src="{{asset('img/okutara_black.png')}}" class="img-fluid"/>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 mt-3">
                <p style="text-align:left;">
                @lang('home.about_us')
                </p>
            </div>
        </div>
        <div class="row my-5">
            <div class="col-md-8 offset-md-2">
                <div class="row text-center">
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <img src="{{asset('img/gwen_pic.jpg')}}" class="rounded-circle mx-auto d-block"
                             style="width:200px">
                        <br/>
                        <b>Gwen Merida</b>
                        <br/>
                        Software Developer
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <img src="{{asset('img/jp_pic.jpg')}}" class="rounded-circle mx-auto d-block"
                             style="width:200px">
                        <br/>
                        <b>JP Salvacion</b>
                        <br/>
                        UX Designer / Content Director
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <img src="{{asset('img/mica_pic.jpg')}}" class="rounded-circle mx-auto d-block"
                             style="width:200px">
                        <br/>
                        <b>Mica Delmonte</b>
                        <br/>
                        Frontend Developer
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="background-color: white; padding-bottom: 30px">
        <div class="my-5 pt-5">
        <span class="featured-title">
            <span class="font-weight-bold">Contact</span><span class="font-weight-light">Us</span>
        </span>
        </div>
        <div class="row my-5">
            <div class="col-md-8 offset-md-2">
            <iframe src="https://docs.google.com/forms/d/e/1FAIpQLScrpkxpXTI33ULPfpPkdZEralRrX5GnLtgpEeKvmNbvYqXUsw/viewform?embedded=true" width="640" height="800" frameborder="0" marginheight="0" marginwidth="0">Loading…</iframe>
            </div>
        </div>
    </div>
</div>

@endif
@endsection
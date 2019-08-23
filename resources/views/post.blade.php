@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center align-content-center">
        <div class="flex-column">
            <div class="d-flex">
                @if($type == 'img')
                <img src="{{ $file }}" width="100%">
                @elseif($type == 'vid')
                <video autoplay loop width="100%" controls>
                    <source src="{{ $file }}" type="video/mp4"/>
                </video>
                @endif
            </div>
            <iframe width="560" height="315" src="{{ $post->link }}" frameborder="0"
                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
            <div class="d-flex">
                <h1>{{ $post->title }}</h1>
            </div>
            <div class="d-flex">
                <h5>{{ $post->user->name }} | {{ $post->created_at }}</h5>
            </div>
            <div class="d-flex">
                <h5>{{ $post->description }}</h5>
            </div>
            @if(Auth::check())
            <div class="d-flex">
                <span class="mr-1">{{ count($post->likes) }}</span>
                @if(!$isLiked)
                    <a href="/like/{{ $post->id }}">Likes</a>
                @else
                    <span>Likes</span>
                @endif
            </div>
            @else
                <span class="mr-1">{{ count($post->likes) }} Likes</span>
            @endif
        </div>
    </div>
</div>
@endsection

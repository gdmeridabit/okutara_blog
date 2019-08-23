@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center align-content-center">
        <div class="flex-column">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/uYfuWKjtDuU" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <div class="d-flex">
                @if($type == 'img')
                <img src="{{ $file }}" width="100%">
                @elseif($type == 'vid')
                <video autoplay loop width="100%" controls>
                    <source src="{{ $file }}" type="video/mp4"/>
                </video>
                @endif
            </div>
            <div class="d-flex">
                <h1>{{ $post->title }}</h1>
            </div>
            <div class="d-flex">
                <h5>{{ $post->user->name }} | {{ $post->created_at }}</h5>
            </div>
            <div class="d-flex">
                <h5>{{ $post->description }}</h5>
            </div>

            <div class="d-flex">
                <span class="mr-1">{{ count($post->likes) }}</span>
                <a href="/like/{{ $post->id }}">Like</a>

            </div>

        </div>
    </div>
</div>
@endsection

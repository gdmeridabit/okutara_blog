@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" >
        @foreach($category as $data)
            @foreach($data->posts as $post)
            <div class="card ml-2 mb-2" >
                <div class="card-body">
                    <h4 class="card-title text-primary">{{ $post->title }}</h4>
                    <p>{{ $post->user->name }} | {{ $post->created_at }}</p>
                    <a href="/post/{{ $post->id }}" class="card-link">Read</a>
                </div>
            </div>
            @endforeach
        @endforeach
    </div>
</div>
@endsection

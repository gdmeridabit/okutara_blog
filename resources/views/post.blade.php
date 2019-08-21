@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center align-content-center">
        <div class="flex-column">
            <div class="d-flex">
                <img src="{{ $image }}" width="100%">
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
        </div>
    </div>
</div>
@endsection

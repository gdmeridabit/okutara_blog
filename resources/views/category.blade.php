@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @foreach($categories as $data)
        <div class="col-2">
            <a href="/category/{{ $data->id }}">{{$data->name}}</a>
        </div>
        @endforeach
    </div>
</div>
@endsection
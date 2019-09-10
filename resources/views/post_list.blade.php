@extends('layouts.app')

@section('content')
<div class="container">
  <div class="categories-content">
    <div class="text-center mt-5 mb-4">
      <h2 class="font-weight-bold">{{$category[0]->name}}</h2>
    </div>
    <div class="row">
      @foreach($category as $data)
        @foreach($data->posts as $post)
        <div class="col-4">
          <a href="/post/{{ $post->id }}" class="card-link">
            <div class="card ml-2 mb-2 list" style="width: 100%; height: 460px">
              <div style="height: 220px; width: 100%">
                <img src="{{asset('storage/files/'. $post->filename)}}" class="img-fluid" style="height: 100%; width: 100%; object-fit:cover" />
              </div>
              <div class="card-body">
                <h4 class="card-title text-dark h4 font-weight-bold" style="min-height: 60px;">{{ $post->title }}</h4>
                <p class="text-dark small">{{ $post->user->name }} <br /> {{ $post->created_at }}</p>
                <p class="text-dark text-truncate">{{ $post->description }}</p>
                <div class="text-dark text-right">
                  <i class="fas fa-thumbs-up ml-2 mr-1"></i> {{ count($post->likes) }}
                </div>
              </div>
            </div>
          </a>
        </div>
        @endforeach
      @endforeach
    </div>
  </div>
</div>
@endsection

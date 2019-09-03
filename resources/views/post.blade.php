@extends('layouts.app')

@section('content')
<div style="width: 100%">
	<img src="{{ $file }}" class="blog-main" />
</div>
<div class="container">
	<div class="blog-post mt-5">
		<div class="d-flex">
			<h2 class="font-weight-bold">{{ $post->title }}</h2>
		</div>
		<div class="d-flex">
			<h6 class="mb-4 mx-3">
				<span class="font-weight-normal">
					<i class="fas fa-pencil-alt pr-1"></i> 
					{{ $post->user->name }}</span> | <span class="font-weight-light">{{ $post->created_at }}
				</span>
			</h6>
		</div>
		<iframe width="100%" height="500px" src="{{$post->link}}" frameborder="0"
			allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
			allowfullscreen></iframe>
		<!-- <div class="d-flex">
			@if($type == 'img')
			<img src="{{ $file }}" width="100%">
			@elseif($type == 'vid')
			<video autoplay loop width="100%" controls>
				<source src="{{ $file }}" type="video/mp4"/>
			</video>
			@endif
		</div> -->
		<div class="d-flex">
			<p class="mx-2 my-4">{{ $post->description }}</p>
		</div>
		<hr />
		@if(Auth::check())
		<div class="d-flex">
			<span class="mr-1"></span>
			@if(!$isLiked)
				<a class="btn btn-outline-primary" href="/like/{{ $post->id }}"><i class="fas fa-thumbs-up mr-1"></i>{{ count($post->likes) }} Like</a>
			@else
				<span class="text-secondary mr-1"><i class="fas fa-thumbs-up mr-1"></i> {{ count($post->likes) }} Liked </span>
			@endif
		</div>
		<div class="d-flex my-3">
			<a href="{{ $post->getShareUrl('facebook') }}" target="_blank" class="btn btn-outline-secondary btn-sm mx-1">
				<i class="fab fa-facebook mr-1"></i> Share on Facebook
			</a>
			<a href="{{ $post->getShareUrl('twitter') }}" target="_blank" class="btn btn-outline-secondary btn-sm mx-1">
				<i class="fab fa-twitter mr-1"></i> Share on Twitter
			</a>
		</div>
		@endif
		</div>
	</div>
</div>
@endsection

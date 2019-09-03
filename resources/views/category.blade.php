@extends('layouts.app')

@section('content')
<div class="container">
  <div class="text-center mt-5 mb-4">
    <h2 class="font-weight-bold">Categories</h2>
    <small>What do you want to read about?</small>
  </div>
  <div class="row">
	@foreach($categorie $data)
	<div class="col-3 categories-card">
	  <a href="/category/{{ $data->id }}">
		<div class="card bg-dark border-light text-white">
		  <img class="card-img categories-img" src="https://i.imgur.com/Od5sxri.jpg" alt="category">
		  <div class="card-img-overlay">
			<div class="row justify-content-center align-content-center px-3"
			  style="height: 100%">
			  <h3>{{$data->name}}</h3>
			</div>
		  </div>
		</div>
	  </a>
	</div>
	@endforeach
  </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
	<div class="categories-content">
		<div class="text-center mt-5 mb-4">
			<h2 class="font-weight-bold">@lang('nav.category')</h2>
			<small>Know more about Okutama</small>
		</div>
		<div class="row">
		@foreach($categories as $data)
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 categories-card">
			<a href="{{ route('categorize-post', ['locale' => App::getLocale(), 'id' => $data->id]) }}">
				<div class="card categories-link">
					<div class="card-body text-center py-5 my-4"
						style="height: 200px;">
						<div class="row justify-content-center align-content-center px-3"
							style="height:100%">
							<div class="col-md-12">
								<i class="{{$data->icon}}" style="font-size: 50px; color: {{$data->color}}"></i>
							</div>
							<div class="col-md-12 mt-2">
								<p class="h5 card-text text-dark">{{$data->name}}</p>
							</div>
						</div>
					</div>
				</div>
			</a>
		</div>
		@endforeach
		</div>
	</div>
</div>
@endsection

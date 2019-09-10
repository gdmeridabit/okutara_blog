@extends('layouts.app')

@section('content')
<div class="container">
  <div class="blog-content mt-5">
	<div class="text-center">
		<span class="mt-3 mb-2 blog-create__title">
			Add New Post
		</span>
	</div>
	@if (session('create_success'))
	<div class="d-flex justify-content-center">
		<div class="alert alert-success alert-block">
		<button type="button" class="close" data-dismiss="alert">×</button>
		<strong>{{ session('create_success') }}</strong>
		</div>
	</div>
	@endif
	@if (session('create_failed'))
	<div class="d-flex justify-content-center">
		<div class="alert alert-error alert-block">
		<button type="button" class="close" data-dismiss="alert">×</button>
		<strong>{{ session('create_failed') }}</strong>
		</div>
	</div>
	@endif
	<div class="d-flex flex-column justify-content-center">
		<form action="/create" enctype="multipart/form-data" method="POST">
		@csrf
		<div class="form-group blog-form">
			<input type="text" class="form-control " id="title" name="title"
				placeholder="Enter a catchy blog title here!">
			@error('title')
			<span class="text-danger">{{ $message }}</span>
			@enderror
		</div>
		<div class="form-group blog-form">
			<div class="row">
			<div class="col-sm-4">
				<label class="blog-create__label" for="url">Upload image or video</label>
				<input type="file" class="form-control-file" id="fileToUpload" name="fileToUpload">
				<small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of
				image should
				not be more than 10MB.
				</small>
				@error('fileToUpload')
				<span class="text-danger">{{ $message }}</span>
				@enderror
			</div>
			<div class="col-sm-1 pt-4">
				<h4>OR</h4>
			</div>
			<div class="col-sm-7">
				<label class="blog-create__label" for="url">Or you can also add link from youtube</label>
				<input type="text" class="form-control" id="link" name="link"
					placeholder="Please enter url link here">
				<small class="form-text text-muted">Please provide the embedded link. 	EX. https://www.youtube.com/embed/DRu7clboPP0</small>
				@error('link')
				<span class="text-danger">{{ $message }}</span>
				@enderror
			</div>		
			</div>
		</div>
		<div class="form-group blog-form">
			<label class="blog-create__label" for="url">Category</label><br/>
			<div class="row justify-content-center">
			@foreach ($categories as $data)
			<div class="col-3">
				<input type="checkbox" name="categories[]" value="{{ $data->id }}"> {{ $data->name }}<br>
			</div>
			@endforeach
			</div>
		</div>
		<!-- Create the editor container -->
		<div class="form-group blog-form">
			<label class="blog-create__label" for="description">Description</label><br/>
			<textarea class="form-control" id="summernote" name="description"></textarea>
			<small class="form-text text-muted">Write a short description about your post</small>
			@error('description')
			<span class="text-danger">{{ $message }}</span>
			@enderror
		</div>
		<div class="text-center">
			<button class="btn blog-create__publish" type="submit">Publish</button>
		</div>
		</form>
	</div>
  </div>
</div>
@endsection

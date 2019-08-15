@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-center mt-5">
        <h2 class="display-4">Create Post</h2>
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
        <form action="/post/create" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title"
                       placeholder="Please enter post title">
                @error('title')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="url">Upload image or video</label>
                <input type="file" class="form-control-file" id="fileToUpload" name="fileToUpload">
                <small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of
                    image should
                    not be more than 10MB.
                </small>
                @error('fileToUpload')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="url">Category</label><br/>
                <input type="checkbox" name="vehicle1" value="Bike"> I have a bike<br>
                <input type="checkbox" name="vehicle2" value="Car"> I have a car<br>
                <input type="checkbox" name="vehicle3" value="Boat" checked> I have a boat<br>
            </div>
            <div class="form-group">
                <label for="description">Description</label><br/>
                <textarea class="form-control" id="description" name="description" maxlength="500"></textarea>
                <small class="form-text text-muted">Write a short description about your post</small>
                @error('description')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <button class="btn btn-primary" type="submit">Submit</button>
        </form>
    </div>
</div>
@endsection

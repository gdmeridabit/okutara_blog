@extends('layouts.app')

@section('content')
<div class="dashboard-container">
    <div class="mt-5">
        <div class="text-center">
            <h3>Hello, <span class="font-weight-bold text-success">{{ Auth::user()->name }}</span>!</h3>
            <small>Share your Okutama Experience</small>
        </div>
        @if (session('delete_success'))
        <div class="d-flex justify-content-center">
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ session('delete_success') }}</strong>
            </div>
        </div>
        @endif
        @if (session('delete_failed'))
        <div class="d-flex justify-content-center">
            <div class="alert alert-error alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ session('delete_failed') }}</strong>
            </div>
        </div>
        @endif
        <div class="row mt-3">
            <div class="col-sm-4">
                <div class="container dashboard-content">
                    <h5>ACCOUNT INFORMATION</h5>
                    <hr/>
                    <div class="row">
                        <div class="col-sm-4 text-right font-weight-bold">
                            Full Name
                        </div>
                        <div class="col-sm-8">
                            {{ Auth::user()->name }}
                        </div>
                        <div class="col-sm-4 text-right font-weight-bold">
                            Username
                        </div>
                        <div class="col-sm-8">
                            {{ Auth::user()->username }}
                        </div>
                        <div class="col-sm-4 text-right font-weight-bold">
                            Email
                        </div>
                        <div class="col-sm-8">
                            {{ Auth::user()->email }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="container dashboard-blogs">
                    <div style="padding: 20px">
                        <h5>BLOGS</h5>
                        <hr/>
                    </div>
                    @if(isset($posts))
                    @foreach($posts as $post)
                    <div class="flex-column">
                        <div class="d-flex dashboard">
                            <div class="dashboard-link">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <img src="{{asset('storage/files/'. $post->filename)}}" width="100%"/>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="dashboard-actions">
                                            <a class="btn btn-light" href="{{ url('/post/update/' . $post->id) }}" ><i class="fas fa-edit"></i></a>
                                            <a class="btn btn-light" href="{{ url('/dashboard/' . $post->id) }}" ><i class="fas fa-trash-alt"></i></a>
                                        </div>
                                        <span class="h4 font-weight-bold">
                      {{ $post->title }}
                    </span>
                                        <br/>
                                        <span class="small text-secondary">
                      {{ $post->created_at }}
                    </span>
                                        <br/>
                                        <p class="text-secondary text-truncate">
                                            {{ $post->description }}
                                        </p>
                                        <a class="btn btn-outline-success" href="/post/{{ $post->id }}">Read More</a>
                                        <i class="fas fa-thumbs-up ml-2 mr-1"></i> {{ count($post->likes) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container dashboard-container">
    <div class="mt-5">
        <div class="text-center">
            <h3>Hello, <span class="font-weight-bold text-success">{{ Auth::user()->name }}</span>!</h3>
            <small>What are you writing about today?</small>
        </div>
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
            @if (session('delete_success'))
            <div class="d-flex justify-content-center">
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ session('create_success') }}</strong>
                </div>
            </div>
            @endif
            @if (session('delete_failed'))
            <div class="d-flex justify-content-center">
                <div class="alert alert-error alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ session('create_failed') }}</strong>
                </div>
            </div>
            @endif
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
                            <a href="/post/{{ $post->id }}" class="dashboard-link">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <img src="{{ asset('img/logo1_black.png') }}" width="100%"/>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="float-right">
                                            <div class="btn-group">
                                                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <button class="dropdown-item" type="button">Edit</button>
                                                    <button class="dropdown-item" type="button" onclick="{{ url('/dashboard/' . $post->id) }}">Delete</button>
                                                </div>
                                            </div>
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
                                        <div class="dashboard-likes">
                                            <i class="fas fa-thumbs-up ml-2 mr-1"></i> {{ count($post->likes) }}
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <a class="dropdown-item" type="button" href="{{ url('/dashboard/' . $post->id) }}" >Delete</a>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

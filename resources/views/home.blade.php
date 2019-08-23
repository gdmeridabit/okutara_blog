@extends('layouts.app')

@section('content')
<div class="container dashboard-container">
  <div class="mt-5">
    <h3>Hello, <span class="font-weight-bold text-success">{{ Auth::user()->name }}</span>!</h3>
    <div class="row mt-3">
      <div class="col-sm-4">
        <h5>ACCOUNT INFORMATION</h5>
        <div class="container dashboard-content">
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
        <h5>BLOGS</h5>
        <div class="container dashboard-blogs">
          <div class="flex-column">
            <div class="d-flex dashboard">
              <a href="/" class="dashboard-link">
                <div class="row">
                  <div class="col-sm-3">
                    <img src="{{ asset('img/logo1_black.png') }}" width="100%" />
                  </div>
                  <div class="col-sm-9">
                    <div class="float-right">
                      <div class="btn-group">
                        <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                          <button class="dropdown-item" type="button">Edit</button>
                          <button class="dropdown-item" type="button">Delete</button>
                        </div>
                      </div>
                    </div>
                    <span class="h4 font-weight-bold">
                      Hello, this is a title.
                    </span>
                    <br />
                    <span class="small text-secondary">
                      August 22, 2019
                    </span>
                    <br />
                    <p class="text-secondary text-truncate">
                      Ambitioni dedisse scripsisse iudicaretur. Cras mattis iudicium purus sit amet fermentum. Donec sed odio operae, eu vulputate felis rhoncus. Praeterea iter est quasdam res quas ex communi. At nos hinc posthac, sitientis piros Afros. Petierunt uti sibi concilium totius Galliae in diem certam indicere. Cras mattis iudicium purus sit amet fermentum.
                    </p>
                    <div class="dashboard-likes">
                      <i class="fas fa-thumbs-up ml-2 mr-1"></i> 102
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

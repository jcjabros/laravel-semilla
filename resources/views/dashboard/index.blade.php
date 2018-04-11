@extends('layouts.app')

@section('content')
@include('inc.sidebar') 
<div class="container">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                <h1 class="h2">Dashboard</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                  <div class="btn-group mr-2">
                    <button class="btn btn-sm btn-outline-secondary">Share</button>
                    <button class="btn btn-sm btn-outline-secondary">Export</button>
                  </div>
                  <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
                    <span data-feather="calendar"></span>
                    This week
                  </button>
                </div>
              </div>
              <div class="card text-center">
                    <div class="card-header text-uppercase">
                      <h5>Welcome</h5>
                    </div>
                    <div class="card-body">
                      <h1 class="card-title text-capitalize">{{$user->name}}</h1>
                      <br>
                      <h5 class="card-text">{{$user->email}}  <a href="#"><span data-feather="edit"></h5>
                        <hr>
                      <a href="/changePassword" class="btn btn-primary">Change Password
                            <span data-feather="edit"></span>
                      </a>
                    </div>
                    <div class="card-footer text-muted">
                      Member sice {{$user->created_at}}
                    </div>
                  </div>
</div>
@endsection

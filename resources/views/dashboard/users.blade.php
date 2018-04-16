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
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                        Users
                   <a href="/register" class="btn btn-primary d-inline p-2 float-right"> <span data-feather="plus-circlecle"></span> Create User</a>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
                @if(count($users) > 0)
                        <table class="table table-striped" id="products_table">
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Role</th>
                                <th></th>
                            </tr>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$countUsers++}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->roles()->first()->description}}</td>
                                    <td>
                                            {!!Form::open(['action' => ['Auth\DestroyController@delete', $user->id],'method' => 'POST', 'class' => 'pull-right form-delete','onsubmit' => 'return ConfirmDelete()'])!!}
                                                {{Form::hidden('_method', 'DELETE')}}
                                                {{Form::submit('Delete', ['class' => 'btn btn-danger float-right'])}}
                                            {!!Form::close()!!}
                                        </td>
                                </tr>
                            @endforeach
                            
                        </table>
                    @else
                        <p>You have no users</p>
                    @endif
            </div>
        </div>
    </div>
</div>
@endsection

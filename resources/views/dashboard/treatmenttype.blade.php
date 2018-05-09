@extends('layouts.app')

@section('content')
@include('inc.sidebar') 
<div class="container">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                <h1 class="h2">Treatment Types</h1>
              </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Treatment Types
                   <a href="/treatments/create" class="btn btn-primary d-inline p-2 float-right"> <span data-feather="plus-circlecle"></span> Create a Treatment Type</a>
                </div>
                @if(count($treatmenttypes) > 0)
                        <table class="table table-striped">
                            <tr>
                                <th>Name</th>
                                <th></th>
                                <th></th>
                            </tr>
                            @foreach($treatmenttypes as $treatmenttype)
                                <tr>
                                    <td>{{$treatmenttype->name}}</td>
                                    <td><a href="/treatments/{{$treatmenttype->id}}/edit" class="btn btn-primary float-right"><span data-feather="edit"></span> Edit</a></td>
                                    <td>
                                        {!!Form::open(['action' => ['TreatmentTypeController@destroy', $treatmenttype->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                            {{Form::hidden('_method', 'DELETE')}}
                                            {{Form::submit('Delete', ['class' => 'btn btn-danger float-right'])}}
                                        {!!Form::close()!!}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <p>We have no categories</p>
                    @endif
            </div>
        </div>
    </div>
</div>
@endsection

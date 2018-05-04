
  @extends('layouts.app')

@section('content')
@include('inc.sidebar') 
<div class="container">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                <h1 class="h2">Before and After</h1>
              </div>
    <div class="row justify-content-center">
        <div class="col-lg-7">
            {!! Form::open(['action' => 'BeforenAfterController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}   
            <h3>Create a Before and After</h3>
            <div class="form-group col-md-6">
                    {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
                </div> 
                <div class="row">
            <div class="form-group col-md-4">
                    {{Form::label('before-img', 'Before Image :')}}
                    {{Form::file('before-img')}}
                    </div>
                <div class="form-group col-md-4">
                        {{Form::label('after-img', 'After Image :')}}
                        {{Form::file('after-img')}}
                    </div>
                </div>
                    {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
                  {!! Form::close() !!}
        </div>
        <div class="col-lg-5">
                @if(count($BnASliders) > 0)
                        <table class="table table-striped">
                            <tr>
                                <th>Title</th>
                                <th></th>
                            </tr>
                            @foreach($BnASliders as $BnASlider)
                                <tr>
                                    <td>{{$BnASlider->title}}</td>
                                    <td>
                                        {!!Form::open(['action' => ['BeforenAfterController@destroy', $BnASlider->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                            {{Form::hidden('_method', 'DELETE')}}
                                            {{Form::submit('Delete', ['class' => 'btn btn-danger float-right'])}}
                                        {!!Form::close()!!}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <p>We have no Before and After</p>
                    @endif
            </div>
        </div>
    </div>
@endsection

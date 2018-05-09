@extends('layouts.app')
@section('content')
@include('inc.sidebar') 
<div class="container m-b-5">
    <h1>Create Treatment</h1>
    {!! Form::open(['action' => 'TreatmentController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group col-sm-4">
            {{Form::label('name', 'Name')}}
            {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name'])}}
        </div>
        <div class="form-group col-sm-12">
            {{Form::label('description', 'Description')}}
            {{Form::textarea('description', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Description'])}}
        </div>
                <div class="form-group col-sm-4">
                        {{Form::label('type', 'Type')}}
                                <select id="type" class="form-control{{ $errors->has('type') ? ' is-invalid' : '' }}" name="type" value="{{ old('type') }}" required autofocus>
                                    @foreach($treatmenttypes as $treatmenttype)
                                    <option>{{$treatmenttype->name}}</option>
                                    @endforeach
                                      </select>
                            @if ($errors->has('type'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('type') }}</strong>
                                </span>
                            @endif
                    </div>
                    <div id="dynamic_field">
                            <button type="button" name="add" id="add" class="btn btn-success m-1">Add More</button>
                            <div id="row-dynamic1" class="row p-1">
                                <div class="col-md-3"><input type="text" name="durations[]" placeholder="Duration" class="form-control name_list" /></div>
                                <div class="col-md-3"><input type="text" name="prices[]" placeholder="Price" class="form-control name_list" /></div>        
                        </div>
                    </div>
            
        {{Form::submit('Submit', ['class'=>'btn btn-primary float-right'])}}
    {!! Form::close() !!}
</div>
@endsection

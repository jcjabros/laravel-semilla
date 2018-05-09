@extends('layouts.app')
@section('content')
@include('inc.sidebar') 
<div class="container">
    <h1>Create Treatment Type</h1>
    {!! Form::open(['action' => 'TreatmentTypeController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group col-sm-4">
            {{Form::label('name', 'Name')}}
            {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name'])}}
        </div>
        <div class="form-group">
            {{Form::label('description', 'Description')}}
            {{Form::textarea('description', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Description'])}}
        </div>
            <div class="form-group">
                    <div class="custom-file">
                            <input id="cover_image" name="cover_image" type="file" class="custom-file-input">
                            <label class="custom-file-label" for="customFile">Cover Image</label>
                          </div>
            </div>
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
</div>
@endsection
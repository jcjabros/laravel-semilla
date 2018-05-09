@extends('layouts.app')

@section('content')
 @include('inc.sidebar') 
    <div class="container">
        <h1>Add Image</h1>
        {!! Form::open(['action' => 'GalleryController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="form-group">
                {{Form::label('title', 'Title')}}
                {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
            </div>
            <div class="form-group">
                {{Form::label('body', 'Description')}}
                {{Form::textarea('body', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Description'])}}
            </div>
            <div class="form-group">
                    <div class="custom-file">
                            <input id="cover_image" name="cover_image" type="file" class="custom-file-input">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                          </div>
            </div>
            {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
        {!! Form::close() !!}
    </div>
@endsection
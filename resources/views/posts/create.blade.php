@extends('layouts.app')

@section('content')
 @include('inc.sidebar') 
    <div class="container">
        <h1>Create Post</h1>
        {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="form-group">
                {{Form::label('title', 'Title')}}
                {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
            </div>
            <div class="form-group">
                {{Form::label('body', 'Body')}}
                {{Form::textarea('body', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body Text'])}}
            </div>
                <div class="form-group">
                        <div class="custom-file">
                                <input id="cover_image" name="cover_image" type="file" class="custom-file-input">
                                <label class="custom-file-label" for="customFile">Post Image Recommended Size 768 X 512.</label>
                              </div>
                </div>
            {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
        {!! Form::close() !!}
    </div>
@endsection
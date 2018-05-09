@extends('layouts.app')

@section('content')
 @include('inc.sidebar') 
    <div class="container">
            <h1>Edit Image</h1>
            {!! Form::open(['action' => ['GalleryController@update', $image->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                <div class="form-group">
                    {{Form::label('title', 'Title')}}
                    {{Form::text('title', $image->title, ['class' => 'form-control', 'placeholder' => 'Title'])}}
                </div>
                <div class="form-group">
                    {{Form::label('body', 'Description')}}
                    {{Form::textarea('body', $image->description, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Description'])}}
                </div>
                <div class="form-group">
                        <div class="custom-file">
                                <input id="cover_image" name="cover_image" type="file" class="custom-file-input">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                              </div>
                </div>
                {{Form::hidden('_method','PUT')}}
                {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
            {!! Form::close() !!}
    </div>
@endsection
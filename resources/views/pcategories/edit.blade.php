@extends('layouts.app')

@section('content')
@include('inc.sidebar') 
<div class="container">
    <h1>Update Category</h1>
    {!! Form::open(['action' => ['PCategoriesController@update', $pCategory->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group col-sm-4">
            {{Form::label('name', 'Name')}}
            {{Form::text('name', $pCategory->name, ['class' => 'form-control', 'placeholder' => 'Name'])}}
        </div>
        <div class="form-group col-sm-4">
                {{Form::label('size', 'Sizes')}}
                {{Form::text('size', $pCategory->sizes, ['class' => 'form-control', 'placeholder' => 'Sizes'])}}
            </div>
        <div class="form-group">
            {{Form::label('description', 'Description')}}
            {{Form::textarea('description', $pCategory->description, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Description'])}}
        </div>
        <div class="form-group">
            {{Form::label('cover_image', 'Cover Image')}}
            {{Form::file('cover_image')}}
            </div>
        {{Form::hidden('_method','PUT')}}
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
</div>
@endsection
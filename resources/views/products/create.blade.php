@extends('layouts.app')

@section('content')
@include('inc.sidebar') 
<div class="container">
    <h1>Create Product</h1>
    {!! Form::open(['action' => 'ProductController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group col-sm-4">
            {{Form::label('name', 'Name')}}
            {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name'])}}
        </div>
        <div class="form-group col-sm-4">
                {{Form::label('code', 'Product Code')}}
                {{Form::text('code', '', ['class' => 'form-control', 'placeholder' => 'Code'])}}
            </div>
        <div class="form-group col-sm-4">
                {{Form::label('size', 'Size')}}
                {{Form::text('size', '', ['class' => 'form-control', 'placeholder' => 'Size'])}}
            </div>
        <div class="form-group">
            {{Form::label('description', 'Description')}}
            {{Form::textarea('description', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Description'])}}
        </div>
        <div class="form-group">
            {{Form::label('cover_image1', 'Product Image 1')}}
            {{Form::file('cover_image1')}}
            <small> Recommended Size 768 X 512.</small>
            </div>
        <div class="form-group">
                {{Form::label('cover_image2', 'Product Image 2')}}
                {{Form::file('cover_image2')}}
                <small> Recommended Size 768 X 512.</small>
            </div>
        <div class="form-group">
                {{Form::label('cover_image3', 'Product Image 3')}}
                {{Form::file('cover_image3')}}
                <small> Recommended Size 768 X 512.</small>
            </div>
            <div class="form-group col-sm-4">
                    {{Form::label('category', 'Category')}}
                            <select id="category" class="form-control{{ $errors->has('category') ? ' is-invalid' : '' }}" name="category" value="{{ old('category') }}" required autofocus>
                                @foreach($categories as $category)
                                <option>{{$category->name}}</option>
                                @endforeach
                                  </select>
                        @if ($errors->has('category'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('category') }}</strong>
                            </span>
                        @endif
                </div>
                <div class="form-group col-sm-4">
                        {{Form::label('price', 'Price')}}
                        {{Form::text('price', '', ['class' => 'form-control', 'placeholder' => 'Price', 'min'=>'0', 'step'=>'1', 'data-bind'=>'value:replyNumber'])}}
                    </div>
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
</div>
@endsection
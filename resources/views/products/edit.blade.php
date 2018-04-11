@extends('layouts.app')

@section('content')
@include('inc.sidebar') 
<div class="container">
    <h1>Edit Product</h1>
    {!! Form::open(['action' => ['ProductController@update',$product->id],'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group col-sm-4">
            {{Form::label('name', 'Name')}}
            {{Form::text('name',$product->name, ['class' => 'form-control', 'placeholder' => 'Name'])}}
        </div>
        <div class="form-group col-sm-4">
                {{Form::label('code', 'Product Code')}}
                {{Form::text('code',$product->productCode, ['class' => 'form-control', 'placeholder' => 'Code'])}}
            </div>
        <div class="form-group col-sm-4">
                {{Form::label('size', 'Size')}}
                {{Form::text('size',$product->size, ['class' => 'form-control', 'placeholder' => 'Size'])}}
            </div>
        <div class="form-group">
            {{Form::label('description', 'Description')}}
            {{Form::textarea('description',$product->description, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Description'])}}
        </div>
        <div class="form-group">
            {{Form::label('cover_image1', 'Carrousel Image 1')}}
            {{Form::file('cover_image1')}}
            </div>
        <div class="form-group">
                {{Form::label('cover_image2', 'Carrousel Image 2')}}
                {{Form::file('cover_image2')}}
            </div>
        <div class="form-group">
                {{Form::label('cover_image3', 'Carrousel Image 3')}}
                {{Form::file('cover_image3')}}
            </div>
            <div class="form-group col-sm-4">
                    {{Form::label('category', 'Category')}}
                            <select id="category" class="form-control{{ $errors->has('category') ? ' is-invalid' : '' }}" name="category" value={{$category->name}} required autofocus>
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
                        {{Form::text('price',$product->price, ['class' => 'form-control', 'placeholder' => 'Price', 'min'=>'0', 'step'=>'1', 'data-bind'=>'value:replyNumber'])}}
                    </div>
        {{Form::hidden('_method','PUT')}}
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
</div>
@endsection
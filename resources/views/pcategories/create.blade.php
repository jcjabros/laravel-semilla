@extends('layouts.app')

@section('content')
@include('inc.sidebar') 
<div class="container">
    <h1>Create Category</h1>
    {!! Form::open(['action' => 'PCategoriesController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group col-sm-4">
            {{Form::label('name', 'Name')}}
            {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name'])}}
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
            {{Form::label('cover_image', 'Cover Image')}}
            {{Form::file('cover_image')}}
            </div>
            <div class="form-group row m-3">
                    <label for="parent" class="col-form-label">{{ __('Parent') }}</label>
                    <div class="col-md-4">
                            <select id="parent" class="form-control{{ $errors->has('parent') ? ' is-invalid' : '' }}" name="parent" value="{{ old('parent') }}" required autofocus>
                               @if($categories->count() > 0)
                               <option>None</option>
                                @foreach($categories as $category)
                                    <option>{{$category->name}}</option>
                                    @endforeach
                                   @else
                                   <option>None</option>
                                   @endif
                                </select>
                        @if ($errors->has('parent'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('parent') }}</strong>
                            </span>
                        @endif
                    </div>
                    <small class="w-100 p-3">Note: If the category chosen above has products, those products will no longer be displayed.</small>
                </div>      
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
</div>
@endsection
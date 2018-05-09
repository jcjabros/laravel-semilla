@extends('layouts.app')
@section('content')
@include('inc.sidebar') 
<div class="container m-b-5">
    <h1>Edit Treatment</h1>
    {!! Form::open(['action' => ['TreatmentController@update', $treatment->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group col-sm-4">
            {{Form::label('name', 'Name')}}
            {{Form::text('name', $treatment->name, ['class' => 'form-control', 'placeholder' => 'Name'])}}
        </div>
        <div class="form-group">
            {{Form::label('description', 'Description')}}
            {{Form::textarea('description', $treatment->description, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Description'])}}
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
                <?php  $j = 50 ?>
                <button type="button" name="add" id="add" class="btn btn-success m-1">Add More</button>
                @foreach($durationPrices as $durationPrice)
                <div id="row-dynamic{{++$j}}" class="row p-1">
                        <div class="col-md-3"><input type="text" name="durations[]" placeholder="Duration" value="{{$durationPrice->duration}}" class="form-control name_list" /></div>
                        <div class="col-md-3"><input type="text" name="prices[]" placeholder="Price" value="{{$durationPrice->price}}"class="form-control name_list" /></div>
                        @if($j != 51)  
                        <div class="col-md-1"> <button type="button" name="remove" id="{{$j}}" class="btn btn-danger btn_remove">X</button></div>
                        @endif      
                </div>
                @endforeach
               
            </div>
        {{Form::hidden('_method','PUT')}}
        {{Form::submit('Submit', ['class'=>'btn btn-primary float-right'])}}
    {!! Form::close() !!}
</div>
@endsection
@extends('layouts.app')

@section('content')
@include('inc.sidebar') 
<div class="container">
    <h1>Home Slider</h1>
    {!! Form::open(['action' => ['HomeSliderController@update',$homeSlider->id], 'method' => 'POST', 'enctype' => 'multipart/form-data','id' => 'form']) !!}
    <div class="row m-5">
           <div class="col-sm-12">
                   <div class="card text-center" style="">
                        <h2 class="card-title m-3">First Slide</h2>
                           <img class="card-img-top img-fluid" style="width:100%; height:300px " src="/storage/cover_images/{{$homeSlider->image1}}" alt="Card image cap">
                           <div class="card-body"> 
                           {{Form::file('image1',['id'=>'form-file','class'=>'btn btn-success'])}}
                           <small> Recommended Size 1871 X 512.</small>
                           {{Form::submit('Update', ['class'=>'btn btn-primary float-right'])}}
                           </div>
                   </div>
             </div>
            </div>
            <div class="row m-5"> 
                <div class="col-sm-12">
                        <div class="card text-center" style="">
                                <h2 class="card-title m-3">Second Slide</h2>
                                   <img class="card-img-top img-fluid" style="width:100%; height:300px " src="/storage/cover_images/{{$homeSlider->image2}}" alt="Card image cap">
                                   <div class="card-body"> 
                                   {{Form::file('image2',['id'=>'form-file','class'=>'btn btn-success'])}}
                                   <small> Recommended Size 1871 X 512.</small>
                                   {{Form::submit('Update', ['class'=>'btn btn-primary float-right'])}}
                                   </div>
                           </div>
              </div>
            </div>
            <div class="row m-5">
                <div class="col-sm-12">
                        <div class="card text-center" style="">
                                <h2 class="card-title m-3">Third Slide</h2>
                                   <img class="card-img-top img-fluid" style="width:100%; height:300px " src="/storage/cover_images/{{$homeSlider->image3}}" alt="Card image cap">
                                   <div class="card-body"> 
                                   {{Form::file('image3',['id'=>'form-file','class'=>'btn btn-success'])}}
                                   <small> Recommended Size 1871 X 512.</small>
                                   {{Form::submit('Update', ['class'=>'btn btn-primary float-right'])}}
                                   </div>
                           </div>
              </div>
            </div>
            {!! Form::close() !!}
    </div>
@endsection
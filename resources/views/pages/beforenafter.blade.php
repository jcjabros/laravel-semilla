
@extends('layouts.app')
@section('content')
<h1 class="text-uppercase text-center"> Before and After</h1> 
@if(count($BnASliders) > 0)
<div class="row">
@foreach($BnASliders as $BnASlider)
<div class="col-lg-6 p-5">
    <div class="ba-slider">
                <img src="/storage/before_after_images/{{$BnASlider->before_img}}">
                <div class="resize">
                    <img src="/storage/before_after_images/{{$BnASlider->after_img}}">
                </div>
            <span class="handle"></span>
         </div>
         <p class="font-italic">"{{$BnASlider->title}}</p>
       </div>
    @endforeach 
 </div>
    @else
    <p>We have no Before and After</p>
    @endif
@endsection
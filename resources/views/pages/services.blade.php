
@extends('layouts.app')

@section('content') 
      SERVICES
      @if(count($services) > 0)
        <ul class="list-grup">
          @foreach($services as $service)
           <li class="list-group-item">{{$service}}</li>
          @endforeach
        <ul>
       @endif     
@endsection
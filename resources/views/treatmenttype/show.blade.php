@extends ('layouts.app')
 @section('content')
 <div class="container">
     <h1 class="text-center">{{$treatmentType->name}}</h1>
     <img style="width:100%; height:500px" src="/storage/cover_images/{{$treatmentType->cover_image}}" alt="Card image cap">
     <p>{!!$treatmentType->description!!}</p> 
     <hr>
     </div>
     @if(count($treatments) > 0)
     <div class="row">
         @foreach($treatments as $treatment)
         <div class="col-lg-6">
             <a href="/treatment/{{$treatment->id}}"><h1>{{$treatment->name}}</h1></a>
         </div>
         @endforeach
     </div>
     @else
     Ups! we have not treatments.Sorry.
     @endif
 </div>   
 @endsection 
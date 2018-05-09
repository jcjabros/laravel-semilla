@extends ('layouts.app')

 @section('content')
 <div class="container">
     <h1 class="text-center">{{$treatment->name}}</h1>
     <p>{!!$treatment->description!!}</p> 
     <hr>
     </div>
 </div>   
 @endsection 
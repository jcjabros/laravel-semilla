@extends ('layouts.app')

 @section('content')
 <br>
 <h1 class="text-center">TREATMENTS</h1>
 @if(count($treatmentTypes) > 0)
 <div class="row">
        @foreach($treatmentTypes as $treatmentType)
        <div class="col-sm-4 mt-3">
           <div class="card" style="">
                  <img class="card-img-top img-fluid" style="width:100%; height:400px " src="/storage/cover_images/{{$treatmentType->cover_image}}" alt="Card image cap">
                  <div class="card-body">
                    <h5 class="card-title"><a href="/treatments/{{$treatmentType->id}}"><h3>{{$treatmentType->name}}</h3></a></h5>
                  </div>
            </div>
           </div>
        @endforeach
 </div>

</div> 
  @else
  <p>Ups! we have no posts.</p>
  @endif

 @endsection 
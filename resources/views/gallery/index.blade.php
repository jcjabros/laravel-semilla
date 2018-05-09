@extends ('layouts.app')

 @section('content')
 <br>
 <h1 class="text-center">GALLERY</h1>
 @if(count($gallery) > 0)
 <?php $countPost = 0;?>

 <div class="row">
        @foreach($gallery as $image)
        <div class="col-sm-4 mt-3">
                <div class="card" style="">
                        <img class="card-img-top img-fluid" style="width:100%; height:400px " src="/storage/cover_images/{{$image->image}}" alt="Card image cap">
                        <div class="card-body">
                          <h5 class="card-title"><h3>{{$image->title}}</h3></h5>
                          <p class="card-text">{!!$image->description!!}</a></p>
                        </div>
                </div>
          </div>
        @endforeach
 </div>

</div> 
   {{$gallery->links()}}

  @else
  <p>Ups! we have no photos.</p>
  @endif

 @endsection 
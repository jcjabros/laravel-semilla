@extends ('layouts.app')

 @section('content')
 <br>
 <h1 class="text-center">{{$name}}</h1>
 @if(count($categories) > 0)
 <?php $countPost = 0;?>

 <div class="row">
        @foreach($categories as $category)
        <div class="col-sm-4 mt-3">
           <div class="card" style="">
                  <img class="card-img-top img-fluid" style="width:100%; height:400px " src="/storage/cover_images/{{$category->cover_image}}" alt="Card image cap">
                  <div class="card-body">
                    <h5 class="card-title"><a href="/catalog/{{$category->id}}"><h3>{{$category->name}}</h3></a></h5>
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
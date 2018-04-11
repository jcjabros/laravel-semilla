@extends ('layouts.app')

 @section('content')
 <br>
 <h1 class="text-center">BLOG</h1>
 @if(count($posts) > 0)
 <?php $countPost = 0;?>

 <div class="row">
        @foreach($posts as $post)
        <div class="col-sm-4 mt-3">
                <div class="card" style="">
                        <img class="card-img-top img-fluid" style="width:100%; height:400px " src="/storage/cover_images/{{$post->cover_image}}" alt="Card image cap">
                        <div class="card-body">
                          <h5 class="card-title"><a href="/posts/{{$post->id}}"><h3>{{$post->title}}</h3></a></h5>
                          <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        </div>
                        <div class="card-footer">
                          <small class="text-muted"><samall>Written by {{$post->user->name}} on {{$post->created_at}} </samall></small>
                        </div>
                </div>
          </div>
        @endforeach
 </div>

</div> 
   {{$posts->links()}}

  @else
  <p>Ups! we have no posts.</p>
  @endif

 @endsection 
@extends ('layouts.app')

 @section('content')
 <div class="container">
  <br>
     <a href="/posts" class="btn btn-secondary">Back</a>
     <br>
     <h1 class="text-center">{{$post->title}}</h1>
     <img style="width:100%; height:500px" src="/storage/cover_images/{{$post->cover_image}}" alt="Card image cap">
     <samll>Written by {{$post->user->name}} on {{$post->created_at}} </samll>
     <p>{!!$post->body!!}</p> 
     <hr>
     @if(!Auth::guest())
      @if(Auth::user()->id == $post->user_id)
     <a href="/posts/{{$post->id}}/edit" class="btn btn-secondary">Edit</a>
     <div class="d-inline float-right">
     {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
    {!!Form::close()!!}
     @endif
    @endif
     </div>
 </div>   
 @endsection 
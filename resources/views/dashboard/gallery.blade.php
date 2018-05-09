@extends('layouts.app')

@section('content')
@include('inc.sidebar') 
<div class="container">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                <h1 class="h2">Gallery</h1>
              </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                        Gallery
                   <a href="/gallery/create" class="btn btn-primary d-inline p-2 float-right"> <span data-feather="plus-circlecle"></span> Add Photo</a>
                </div>
                @if(count($gallery) > 0)
                        <table class="table table-striped">
                            <tr>
                                <th>Title</th>
                                <th></th>
                                <th></th>
                            </tr>
                            @foreach($gallery as $image)
                                <tr>
                                    <td>{{$image->title}}</td>
                                    <td><a href="/gallery/{{$image->id}}/edit" class="btn btn-primary float-right"><span data-feather="edit"></span> Edit</a></td>
                                    <td>
                                        {!!Form::open(['action' => ['GalleryController@destroy', $image->id],'method' => 'POST', 'class' => 'pull-right form-delete','onsubmit' => 'return ConfirmDelete()'])!!}
                                            {{Form::hidden('_method', 'DELETE')}}
                                            {{Form::submit('Delete', ['class' => 'btn btn-danger float-right'])}}
                                        {!!Form::close()!!}
                                    </td> 
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <p>You have no images</p>
                    @endif
            </div>
        </div>
    </div>
</div>
<script>
   function ConfirmDelete()
        {
        var x = confirm("Once you delete a image, there is no going back. Please be certain.");
        if (x)
          return true;
        else
          return false;
        }
</script>
@endsection

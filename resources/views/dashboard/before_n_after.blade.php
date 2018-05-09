
  @extends('layouts.app')

@section('content')
@include('inc.sidebar') 
<div class="container">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                <h1 class="h2">Before and After</h1>
              </div>
    <div class="row justify-content-center">
        <div class="col-lg-6">
            {!! Form::open(['action' => 'BeforenAfterController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}   
            <h3>Create a Before and After</h3>
            <div class="form-group col-md-8">
                    {{Form::text('description', '', ['class' => 'form-control', 'placeholder' => 'Short Description'])}}
                    <div class="custom-file mt-2">
                            <input id="before-img" name="before-img" type="file" class="custom-file-input">
                            <label class="custom-file-label" for="customFile">Before Image</label>
                          </div>
                        <div class="custom-file mt-2">
                                <input id="after-img" name="after-img" type="file" class="custom-file-input">
                                <label class="custom-file-label" for="after-img">After Image</label>
                              </div>
                </div> 
                    {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
                  {!! Form::close() !!}
        </div>
        <div class="col-lg-6">
                @if(count($BnASliders) > 0)
                        <table class="table table-striped">
                            <tr>
                                <th>Title</th>
                                <th></th>
                            </tr>
                            @foreach($BnASliders as $BnASlider)
                                <tr>
                                    <td>{{$BnASlider->title}}</td>
                                    <td>
                                        {!!Form::open(['action' => ['BeforenAfterController@destroy', $BnASlider->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                            {{Form::hidden('_method', 'DELETE')}}
                                            {{Form::submit('Delete', ['class' => 'btn btn-danger float-right'])}}
                                        {!!Form::close()!!}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <p>We have no Before and After</p>
                    @endif
            </div>
        </div>
    </div>
@endsection

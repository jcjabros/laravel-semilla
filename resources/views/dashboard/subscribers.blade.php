@extends('layouts.app')

@section('content')
@include('inc.sidebar') 
<div class="container">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                <h1 class="h2">Dashboard</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                  <div class="btn-group mr-2">
                    <button class="btn btn-sm btn-outline-secondary">Share</button>
                    <button class="btn btn-sm btn-outline-secondary">Export</button>
                  </div>
                  <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
                    <span data-feather="calendar"></span>
                    This week
                  </button>
                </div>
              </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                        Subscribers
                        <button class="btn btn-default float-right" onclick="copyToClipboard(this)">Copy All</button>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
                @if(count($subscribers) > 0)
                        <table class="table table-striped">
                            <tr>
                                <th>Email</th>
                                <th></th>
                            </tr>
                            @foreach($subscribers as $subscriber)
                                <tr>
                                    <td class="email">{{$subscriber->email}}</td>
                                    <td>
                                        {!!Form::open(['action' => ['SubscribersController@delete', $subscriber->id],'method' => 'POST', 'class' => 'pull-right form-delete','onsubmit' => 'return ConfirmDelete()'])!!}
                                            {{Form::hidden('_method', 'DELETE')}}
                                            {{Form::submit('Delete', ['class' => 'btn btn-danger float-right'])}}
                                        {!!Form::close()!!}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        {{$subscribers->links()}}
                    @else
                        <p>You have no subscribers</p>
                    @endif
            </div>
        </div>
    </div>
</div>
<script>
   function ConfirmDelete()
        {
        var x = confirm("Once you delete a post, there is no going back. Please be certain.");
        if (x)
          return true;
        else
          return false;
        }
</script>
<script>
    function copyToClipboard(element) {
    var msg = $(element).closest("tr").find("td.email").text();
    alert(msg);
    var $temp = $("<input>");
    $("body").append($temp);
    $temp.val(msg).select();
    document.execCommand("copy");
    $temp.remove();
}
    </script>
@endsection

@extends ('layouts.app')

 @section('content')
  <br>
    <h1 class="text-center"> {{$name}}</h1>
      @if(count($products) > 0)
        <div class="row">
                @foreach($products as $product)
                <div class="col-sm-4 mt-3">
                        <div class="card" style="">
                                <img class="card-img-top img-fluid" style="width:100%; height:400px " src="/storage/cover_images/{{$product->cover_img1}}" alt="Card image cap">
                                <div class="card-body">
                                  <h5 class="card-title"><a href="/product/{{$product->id}}"><h3>{{$product->name}}</h3></a></h5>
                                </div>
                        </div>
                  </div>
                @endforeach
        </div>
      </div> 
    @else
      <p>Ups! we have no products for this category.</p>
     @endif
 @endsection 
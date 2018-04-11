@extends ('layouts.app')

 @section('content')
 <div class="container">
    <br>
    <div class="row">
        <div class="col-md-8">
              <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                      <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                      </ol>
                      <div class="carousel-inner">
                        <div class="carousel-item active">
                              <img style="width:100%" src="/storage/cover_images/{{$product->cover_img1}}" alt="Card image cap">
                        </div>
                        @if($product->cover_img2 !='noimage.jpg')
                        <div class="carousel-item">
                              <img style="width:100%" src="/storage/cover_images/{{$product->cover_img2}}" alt="Card image cap">
                        </div>
                        @endif
                        @if($product->cover_img3 != 'noimage.jpg')
                        <div class="carousel-item">
                              <img style="width:100%" src="/storage/cover_images/{{$product->cover_img3}}" alt="Card image cap">
                        </div>
                        @endif
                      </div>
                      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                      </a>
                    </div>
        </div>
        <div class="col-md-4">
              <h1>{{$product->name}}</h1>
              <samll>Product code {{$product->productCode}}</samll>
              <p>{!!$product->description!!}</p> 
          </div>
    </div>
 </div> 
 @endsection 
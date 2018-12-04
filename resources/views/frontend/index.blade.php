@extends('layouts.frontend.master')
@section('content')
 <!-- Content / Article -->
 <div class="intro row h-100 m-0">
  <div class="img-intro my-auto col">
   <img src="assets/img/loader.svg" class="" style="width:25%;height:25%" alt="" srcset="">
  </div>
 </div>
 <div class="container p-0">
  <article>
   <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-interval="3000" data-ride="carousel">
    <ol class="carousel-indicators">
     <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
     <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
     <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    
        
    
    <div class="carousel-inner">
      @foreach ($projects as $index => $item)
      <div class="carousel-item {{ ($index == 0) ? 'active' : '' }}">
        <div class="img-crsl">
          <img class="d-block" style="object-fit: cover;width: 100%;height: 100%" src="{{ asset($item->slide) }}" alt="First slide">
        <div class="carousel-caption atas text-left text-dark p-3">
          <h5 class="font-weight-bold mb-0">{{ $item->title }}</h5>
        </div>
        <div class="carousel-caption text-left text-dark p-3">
          <p class="mb-0">{{ str_limit($item->description, 65) }}</p>
        </div>
        </div>
      </div>
     @endforeach
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
  </article>
 </div>
@endsection
@extends('layouts.frontend.master')
@section('content')
 <!-- Content / Article -->
 <div class="intro row h-100 m-0" id="intros">
  <div class="img-intro my-auto col">
   <img src="assets/img/loader.svg" class="" style="width:25%;height:25%" alt="" srcset="">
  </div>
 </div>
 <div class="container p-0">
  <article>
   <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-interval="3000" data-ride="carousel">
    <ol class="carousel-indicators">
    @foreach ($projects as $index => $item)
     <li data-target="#carouselExampleIndicators" data-slide-to="{{ $index}}" class="{{ ($index == 1) ? 'active' : '' }}"></li>
    @endforeach
    </ol>
    
        
    
    <div class="carousel-inner">
      @foreach ($projects as $index => $item)
      <div class="carousel-item {{ ($index == 0) ? 'active' : '' }}">
        <div class="img-crsl">
          <img class="d-block" style="object-fit: cover;width: 100%;height: 100%" src="{{ asset($item->slide) }}" alt="First slide">
        <div class="carousel-caption atas text-left text-dark p-3">
          <a href="{{ route('project.detail', $item->slug) }}"> <h5 class="font-weight-bold mb-0">{{ $item->title }}</h5> </a>
        </div>
        <div class="carousel-caption text-left text-dark p-3">
          <p class="mb-0">
            Scope : {{ $item->scope }} <br>
            Tahun : {{ $item->tahun }} <br>
            Owner : {{ $item->owner }} <br>
          </p>
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
@section('js')
<script>
  $('.carousel').carousel({
   interval: 2000,
  });
  var hasSeenGreeting = localStorage.getItem("greeting");
  if (!hasSeenGreeting) {
   document.getElementById("intros");
   localStorage.setItem("greeting", "true");
  } else {
   document.getElementById("intros").style.display = "none";
  }
  var hours = 0.2; // Reset when storage is more than 24hours
  var now = new Date().getTime();
  var setupTime = localStorage.getItem('setupTime');
  if (setupTime == null) {
   localStorage.setItem('setupTime', now)
  } else {
   if (now - setupTime > hours * 60 * 60 * 1000) {
    localStorage.clear()
    localStorage.setItem('setupTime', now);
   }
  }
 </script>
@endsection
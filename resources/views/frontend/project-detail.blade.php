@extends('layouts.frontend.master')

@section('content')
 <!-- Content / Article -->
 <div class="container p-0 py-3">
  <div class="juduls">
   <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
     <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
     <li class="breadcrumb-item"><a href="{{ route('project') }}">Project</a></li>
     <li class="breadcrumb-item"><a href="{{ url()->previous() }}">Residential</a></li>
     <li class="breadcrumb-item active" aria-current="page">{{ $project->title }}</li>
    </ol>
   </nav>
  </div>
  <article class="project-detail py-3">
   <div class="row h-100 mx-0 d-flex padding-15 justify-content-between">
    <div class="col-lg-8 col-12 order-first order-lg-last text-center image-slider">
     <div class="preview">
      
      <img id="expandedImg" src="{{ asset($project->images[0]->file_name) }}" style="object-fit: cover;width: 100%;height: 100%">

      <div id="imgtext"></div>
     </div>
     <div class="custom-control-inline py-1 px-0">
      @foreach ($project->images as $image)
         <div class="thumb">
          <img src="{{ asset($image->file_name) }}" style="height:100%" onclick="select(this);">
         </div>
      @endforeach
     </div>
    </div>
    <div class="col-lg-4 col-12 order-last order-lg-first">
     <div class="judul-artikel">
      <h3>{{ $project->title }}</h3>
      <h4 class="text-muted">{{ $project->subtitle }}</h4>
     </div>
     <div class="details">
      {{-- <table class="w-100">
       <tr><td colspan="2"></td></tr>
       <tr><td>Scope</td> <td>Perencanaan Dan Pembangunan</td></tr>
       <tr><td>Principal Architect</td> <td>Sigit Pramana Putra,ST</td></tr>
       <tr><td>Year</td> <td>2017</td></tr>
       <tr><td>Status</td> <td>Terbangun</td></tr>
       <tr><td>Owner</td> <td>Mr.Gilang Prasetya</td></tr>
      </table> --}}
     </div>
     <div class="article content text-justify">
      {!! $project->description !!}
     </div>
    </div>
   </div>
  </article>
  <hr class="my-0 text-black-50" />
 </div>
@endsection
@section('js')
<script>
  function select(imgs) {
    var expandImg = document.getElementById("expandedImg");
    expandImg.src = imgs.src;
  }
  </script>
@endsection
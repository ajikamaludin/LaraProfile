@extends('layouts.frontend.master')

@section('content')
 <!-- Content / Article -->
 <div class="container p-0 py-3">
  <div class="juduls">
   <h5>Project Category</h5>
  </div>
  <article class="project-categ">
   <div class="row mx-0 h-100 d-flex justify-content-between">
    
    @foreach ($categories as $category)
    <div class="project-categ col-sm-6 col-6 col-md-6 col-lg-3 my-lg-3">
     <div class="cont-category py-lg-4">
      <a href="{{ route('project.category', $category->id) }}">
       <div class="image-category">
        <img src="{{ asset($category->cover) }}" style="object-fit: cover;width: 100%;height: 100%" alt="" srcset="">
       </div>
      </a>
      <div class="text-center">{{$category->name}}</div>
     </div>
    </div>
    @endforeach

   </div>
  </article>
  <hr class="my-0 text-black-50" />

 </div>
 @endsection

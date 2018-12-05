@extends('layouts.frontend.master')
@section('content')
 <!-- Content / Article -->
 <div class="container px-0 py-3">
  <div class="juduls">
   <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
     <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
     <li class="breadcrumb-item"><a href="{{ route('project') }}">Project</a></li>
     <li class="breadcrumb-item active" aria-current="page">{{ $category->name }}</li>
    </ol>
   </nav>
  </div>
  <article class="project-grid m-2">
   <div class="row mx-0 h-100 d-flex justify-content-between">

    @foreach ($projects as $project)
        
    <div class="project-grid col-sm-6 col-6 col-md-6 col-lg-3">
     <div class="cont-grid py-lg-1">
       <a href="{{ route('project.detail', $project->slug) }}">
       <div class="image-grid">
        <img src="{{ asset($project->slide) }}" style="object-fit: cover;width: 100%;height: 100%" alt="" srcset="">
       </div>
       <div class="mb-0 font-weight-bold">{{ $project->title }}</div>
       <div class="dtl">
        <div class="">{{ str_limit($project->description, 65) }}</div>
        </table>
       </div>
      </a>
     </div>
    </div>

    @endforeach


   </div>

   <div class="padding-15 text-center w-100">
    <div class="nav-page">
     <nav aria-label="Page navigation">
        {{ $projects->links() }}
     </nav>
    </div>
   </div>
  </article>
  <hr class="my-0 text-black-50" />

 </div>
@endsection
@extends('layouts.frontend.master')
@section('content')
 <!-- Content / Article -->
 <div class="container p-0 py-3">
  <div class="juduls">
    <h5 style="font-size:18px">{{ $page->title }}</h5>
   </div>
    <article class="about py-3">
    <div class="row">
      @foreach ($body as $item)
        <div class="col-md-{{ $col }}">
            {!! $item !!}
        </div>
      @endforeach
    </div>
    
    </article>
  <hr class="my-0 text-black-50" />
 </div>
 @endsection
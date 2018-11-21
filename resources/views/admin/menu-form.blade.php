@extends('layouts.admin.admin')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            {{-- <h1 class="m-0 text-dark">Dashboard</h1> --}}
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-10 offset-md-1">
<!-- /.card -->
<div class="card card-primary" id="form-menu">
        <div class="card-header">
          <h3 class="card-title">Menu</h3>
          <div class="card-tools">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          </div>
        </div>
        
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" enctype="multipart/form-data" method="POST" action="{{ isset($menu) ? route('menu.update', $menu->id) : route('menu.store') }}">
          @csrf
          <div class="card-body">
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" id="name" name="name" required value="{{ isset($menu->name) ? $menu->name : "" }}">
            </div>
            <div class="form-group">
                <ul class="nav nav-pills ml-auto p-2">
                    <li class="nav-item"><a class="nav-link {{ (isset($menu->url)) ? "active show" : (!isset($menu)) ? "active show" : "" }}" href="#tab_1" data-toggle="tab" id="ext-link">External Link</a></li>
                    <li class="nav-item"><a class="nav-link {{ (isset($menu->page)) ? "active show" : "" }}" href="#tab_2" data-toggle="tab" id="page-link">Page</a></li>
                  </ul>
            </div>
            <div class="tab-content">
                <div class="form-group tab-pane {{ (isset($menu->url)) ? "active show" : (!isset($menu)) ? "active show" : "" }}" id="tab_1">
                    <label for="name">Link</label>
                    <input type="url" class="form-control" id="name" name="url" value="{{ isset($menu->url) ? $menu->url : "" }}">
                  </div>
                  <div class="form-group tab-pane {{ (isset($menu->page)) ? "active show" : "" }}" id="tab_2">
                      <label>Page</label>
                      <select class="form-control" name="page">
                        @foreach ($pages as $page)
                            <option value="{{ $page->slug }}" {{ isset($menu->page) ? ( ($page->slug == $menu->page) ? "selected" : "") : ""}} >{{ $page->title }}</option>
                        @endforeach
                      </select>
                  </div>
            </div>
            <input type="hidden" name="active" id="active-form" value="{{ isset($menu->url) ? "ext-link" : "" }}{{ isset($menu->page) ? "page" : "" }}">
          </div>
           <!-- /.card-body -->
           <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="submit">Save</button>
                </div>
          
        </form>
      </div>
  </div>
</div>
</div>
<!-- /.row -->
</div>
<!-- /.container-fluid -->
</div>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection

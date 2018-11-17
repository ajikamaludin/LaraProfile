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
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Post Images : {{ $name }}</h3>
              </div>
              <!-- /.card-header -->
                <div class="card-body">
                <!-- form start -->
                  <form role="form" enctype="multipart/form-data" method="POST" action="{{ route('posts.images.upload', $id) }}" class="dropzone" id="dropzone">
                    @csrf
                    <div class="dz-message needsclick">
                        Drop some image here or click to upload.
                    </div>
                  </form>
                  <a class="btn btn-primary col-md-1" href="{{ route('posts.list') }}" style="margin:10px 10px 0px 0px">Save</a>

                  <div class="row" style="margin-top: 20px;" id="imageGrid">
                    <div id="startGrid"></div>
                    @foreach ($images as $image)
                      <div class="col-md-3" grid-id="{{ $image->id }}">
                        <img class="img-fluid  img-galery" src="{{ asset($image->file_name) }}" alt="">
                        <button class="btn btn-danger col-md-12 galery-remove" img-id="{{ $image->id }}">Delete</button>
                      </div>
                    @endforeach
                  </div>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- The Modal -->
  <div id="imgModal" class="modal">

    <!-- The Close Button -->
    <span class="close-modal">&times;</span>

    <!-- Modal Content (The Image) -->
    <img class="modal-content" id="img-modal">

  </div>
@endsection

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
                <h3 class="card-title">Post Images</h3>
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
@endsection

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
            @include('layouts.admin.flash-message')
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Profile</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" enctype="multipart/form-data" method="POST" action="{{ route('admin.profile.store') }}">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" minlength="4" required value="{{  Auth::user()->name }}">
                  </div>
                  <div class="form-group">
                    <label for="picture">Picture</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="picture" name="picture">
                        <label class="custom-file-label" for="picture">Choose file</label>
                      </div>
                    </div>
                  </div>
                    <img src="{{ asset( Auth::user()->picture ) }}" alt="Cover Category" height="200px">
                        <div class="form-group">
                            <label for="email">E-Mail</label>
                        <input type="email" class="form-control" id="email" name="email" minlength="4" required value="{{ Auth::user()->email  }}">
                        </div>
                        <div class="form-group">
                            <label for="link">New Password</label>
                            <input type="password" class="form-control" id="link" name="password" minlength="6" value="">
                            <sub style="color:red;">leave password empty if not changed</sub>
                        </div>
                </div>
                 <!-- /.card-body -->
        
                 <div class="card-footer">
                        <button type="submit" class="btn btn-primary" name="submit">Save</button>
                      </div>
                
              </form>
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

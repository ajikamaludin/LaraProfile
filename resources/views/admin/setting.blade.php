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
                <h3 class="card-title">Settings</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" enctype="multipart/form-data" method="POST" action="{{ route('admin.settings.store') }}">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Site Name</label>
                    <input type="text" class="form-control" id="name" name="name" minlength="4" required value="{{ $setting->name }}">
                  </div>
                  <div class="form-group">
                    <label for="logo">Logo Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="logo" name="logoImg">
                        <label class="custom-file-label" for="logo">Choose file</label>
                      </div>
                    </div>
                  </div>
                    <img src="{{ asset($setting->logo) }}" alt="Cover Category" height="200px">
                    <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" name="address" minlength="4" required value="{{ $setting->address }}">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="tel" class="form-control" id="phone" name="phone" minlength="4" required value="{{ $setting->phone }}">
                        </div>
                        <div class="form-group">
                            <label for="email">E-Mail</label>
                            <input type="email" class="form-control" id="email" name="email" minlength="4" required value="{{ $setting->email }}">
                        </div>
                        <div class="form-group">
                            <label for="link">Facebook</label>
                            <input type="text" class="form-control" id="link" name="link[]" minlength="4" required value="{{ $setting->fb }}">
                        </div>
                        <div class="form-group">
                            <label for="link">Instagram</label>
                            <input type="text" class="form-control" id="link" name="link[]" minlength="4" required value="{{ $setting->ig }}">
                        </div>
                        <div class="form-group">
                            <label for="link">Youtube</label>
                            <input type="text" class="form-control" id="link" name="link[]" minlength="4" required value="{{ $setting->yt }}">
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

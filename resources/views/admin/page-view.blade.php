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
              @include('layouts.admin.flash-message')
              <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Pages</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    <div class="row" style="margin:5px;border:1px dotted black">
                        @foreach ($body as $item)
                            <div class="col-md-{{ $column }}">
                                {!! $item !!}
                            </div>
                        @endforeach
                    </div>
                    
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer" style="margin-top: 30px;">
                      <a class="btn btn-default" href="{{ route('pages.list') }}">Back</a>
                    </div>
                </div>
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

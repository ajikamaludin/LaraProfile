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
              <a href="{{ route('pages.create') }}" class="col-lg-1 btn btn-primary" style="margin-bottom:20px;">New Page</a>
              @include('layouts.admin.flash-message')
              <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Pages</h3>
    
                    <div class="card-tools">
                      <ul class="pagination pagination-sm m-0 float-right">
                          {{ $pages->links() }}
                      </ul>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    <table class="table">
                      <tbody>
                      <tr>
                        <th style="width: 10px">#</th>
                        <th>Title</th>
                        <th style="width: 450px">Action</th>
                      </tr>
                      @if ($pages->count() == 0)
                          <tr>
                            <td></td>
                            <td>Sorry no record found.</td>
                            <td></td>
                          </tr>
                      @else
                        @foreach ($pages as $page)
                        <tr>
                          <td>{{ $page->id }}</td>
                          <td>{{ $page->title }}</td>
                          <td>
                              <a href="{{ route('pages.view', $page->id) }}" style="margin: 0px 10px 0px 10px"> <i class="fa fa-eye"></i> Priview </a>
                              <a href="{{ route('pages.edit', $page->id) }}" style="margin: 0px 10px 0px 10px"> <i class="fa fa-pencil"></i> Edit </a>
                              <a href="{{ route('pages.destroy', $page->id) }}" onclick="return confirm('Are you sure you want to delete the item?')"> <i class="nav-icon fa fa-trash"></i> Delete </a>
                          </td>
                        </tr>
                        @endforeach
                      @endif
                      
                    </tbody></table>
                  </div>
                  <!-- /.card-body -->
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

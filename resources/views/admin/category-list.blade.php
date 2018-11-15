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
              <a href="{{ route('categories.create') }}" class="col-lg-1 btn btn-primary" style="margin-bottom:20px;">New Category</a>
              @include('layouts.admin.flash-message')
              <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Category</h3>
    
                    <div class="card-tools">
                      <ul class="pagination pagination-sm m-0 float-right">
                          {{ $categories->links() }}
                      </ul>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    <table class="table">
                      <tbody>
                      <tr>
                        <th style="width: 10px">#</th>
                        <th>Name</th>
                        <th style="width: 250px">Action</th>
                      </tr>
                      @if ($categories->count() == 0)
                          <tr>
                            <td></td>
                            <td>Sorry no record found.</td>
                            <td></td>
                          </tr>
                      @else
                        @foreach ($categories as $category)
                        <tr>
                          <td>{{ $category->id }}</td>
                          <td>{{ $category->name }}</td>
                          <td>
                              <a href="{{ route('categories.edit', $category->id) }}" style="margin: 0px 10px 0px 10px"> <i class="fa fa-pencil"></i> Edit </a>
                              <a href="{{ route('categories.destroy', $category->id) }}" onclick="return confirm('Yakin akan menghapus item ? item terkait akan ikut dihapus')"> <i class="nav-icon fa fa-trash"></i> Delete </a>
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

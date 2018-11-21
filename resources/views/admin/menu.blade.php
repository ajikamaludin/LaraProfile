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
          <a href="{{ route('menu.create') }}" class="col-lg-1 btn btn-primary" style="margin-bottom:20px;" id="new-btn">New Menu</a>
            <!-- general form elements -->
            @include('layouts.admin.flash-message')
            <div class="card card-default" style="position: relative; left: 0px; top: 0px;" id="card-list">
              <div class="card-header ui-sortable-handle" style="cursor: move;">
                <h3 class="card-title">
                    Menu
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <ul class="todo-list ui-sortable">
                  @if(count($menus) == null)
                    <p>No Menu Setup</p>
                  @endif
                  @foreach ($menus as $menu)
                  <li class="menu">
                      <!-- todo text -->
                      <span class="text">{{ $menu->name }}</span>
                      <!-- General tools such as edit or delete-->
                      <div class="tools">
                        <a href="{{ route('menu.edit', $menu->id ) }}"><i class="fa fa-edit"></i> Edit </a>
                        <a href="{{ route('menu.destroy', $menu->id ) }}" onclick="return confirm('Are you sure you want to delete the item?')"><i class="fa fa-trash-o"></i> Delete </a>
                      </div>
                    </li>    
                  @endforeach
                  
                </ul>
              </div>
              <!-- /.card-body -->
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

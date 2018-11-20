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
                <h3 class="card-title">Page</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" enctype="multipart/form-data" method="POST" action="{{ isset($page) ? route('pages.update', $page->id) : route('pages.store') }}">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" minlength="4" required value="{{ isset($page) ? $page->title : '' }}">
                  </div>
                  <label for="description" style="margin-bottom:50px;">Page Editor</label>
                  <div class="row parent">
                      @if(isset($page))
                          @foreach ($bodys as $index => $item)
                          <div class="col-md-{{ $column }} count" id="master">
                              <div class="form-group" style="margin-top:20px;">
                              <textarea class="form-control" rows="7" name="description[]" id="description{{ $index }}" required style="float:left !important;">
                                    {{ $item }}
                                  </textarea>
                                </div>
                            </div>
                          @endforeach
                      @else
                      <div class="col-md-12 count" id="master">
                        <div class="form-group" style="margin-top:20px;">
                            <textarea class="form-control" rows="7" name="description[]" id="description0" required style="float:left !important;">
                              Click here to edit
                            </textarea>
                          </div>
                      </div>
                      @endif
                      <div id="target"></div>
                  </div>
                    @isset($page)
                      @if(!(count($bodys) >= 3))
                      <div class="row">
                        <div class="col-md-1">
                            <div class="btn btn-danger" id="plus-element" >Add Column</div>
                        </div>
                      </div>
                      @endif
                    @else
                    <div class="row">
                        <div class="col-md-1">
                            <div class="btn btn-danger" id="plus-element" >Add Column</div>
                        </div>
                      </div>
                    @endisset
                    
                </div>
                <!-- /.card-body -->

                <div class="card-footer" style="margin-top: 30px;">
                  <button type="submit" class="btn btn-primary" name="submit">Save</button>
                  <a class="btn btn-default" href="{{ route('pages.list') }}">Cancel</a>
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

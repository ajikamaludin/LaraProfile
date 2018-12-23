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
                <h3 class="card-title">Post</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" enctype="multipart/form-data" method="POST" action="{{ isset($project) ? route('posts.update', $project->id) : route('posts.store') }}">
                @csrf
                <div class="card-body">
                  {{-- title --}}
                  <div class="form-group">
                    <label for="name">Title</label>
                    <input type="text" class="form-control" id="title" name="title" minlength="4" required value="{{ isset($project) ? $project->title : '' }}">
                  </div>
                  {{-- sub title --}}
                  <div class="form-group">
                    <label for="name">Sub Title</label>
                    <input type="text" class="form-control" id="subtitle" name="subtitle" minlength="4" required value="{{ isset($project) ? $project->subtitle : '' }}">
                  </div>
                  {{-- slide / cover--}}
                  <div class="form-group">
                    <label for="slide">Slide Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="slide" name="slideImg" {{ isset($project) ? '' : 'required' }}>
                        <label class="custom-file-label" for="slide">Choose file</label>
                      </div>
                    </div>
                  </div>
                  @isset($project)
                    <img src="{{ asset($project->slide) }}" alt="Cover project" width="50%">
                  @endisset
                  {{-- description / textarea --}}
                <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" rows="7" name="description" id="description" required>
                      @isset($project)
                          {{ $project->description }}
                      @endisset
                    </textarea>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      {{-- status --}}
                      <div class="form-group">
                          <label>Status</label>
                          <select class="form-control" name="status" required>
                            <option value="1"
                              @isset($project)
                                  {{  $project->status == 1 ? 'selected' : '' }}
                              @endisset
                            >Publish</option>
                            <option value="0" 
                              @isset($project)
                                  {{  $project->status == 0 ? 'selected' : '' }}
                              @endisset
                            >Draft</option>
                          </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      {{-- category --}}
                      <div class="form-group">
                          <label>Category</label>
                          <select class="form-control" name="category" required>
                            @if ($categories->count() <= 0)
                              <option value="0" disabled>Create a Category</option>
                            @else
                              @foreach ($categories as $index => $category)
                                  <option value="{{ $category->id }}" 
                                    @isset($project)
                                      {{ $category->id == $project->id_category ? 'selected' : '' }}
                                    @endisset
                                    >{{ $category->name }}</option>
                              @endforeach
                            @endif
                          </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      {{-- status bangunan --}}
                      <div class="form-group">
                        <label for="name">Status Of Building</label>
                        <input type="text" class="form-control" id="status_bangunan" name="status_bangunan" minlength="4" required value="{{ isset($project) ? $project->status_bangunan : '' }}">
                      </div>
                    </div>
                    <div class="col-md-6">
                      {{-- category --}}
                      <div class="form-group">
                        <label for="name">Owner</label>
                        <input type="text" class="form-control" id="owner" name="owner" minlength="4" required value="{{ isset($project) ? $project->owner : '' }}">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      {{-- status bangunan --}}
                      <div class="form-group">
                        <label for="name">Tahun Bangun</label>
                        <input type="text" class="form-control" id="tahun" name="tahun" minlength="4" required value="{{ isset($project) ? $project->tahun : '' }}">
                      </div>
                    </div>
                    <div class="col-md-6">
                      {{-- category --}}
                      <div class="form-group">
                        <label for="name">Scope</label>
                        <input type="text" class="form-control" id="scope" name="scope" minlength="4" required value="{{ isset($project) ? $project->scope : '' }}">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="name">Principal Architect</label>
                    <input type="text" class="form-control" id="architect" name="architect" minlength="4" required value="{{ isset($project) ? $project->architect : '' }}">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="submit">Save & Add Images</button>
                  <a class="btn btn-default" href="{{ route('posts.list') }}">Cancel</a>
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

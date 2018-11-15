<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Admin | {{ config('app.name', 'Laravel') }}</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('plugins/font-awesome/css/font-awesome.min.css') }}">
  <!-- IonIcons -->
  <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div>
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
              <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Choose a Image</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    <table class="table">
                      <tbody>
                      <tr>
                        <th style="width: 10px">#</th>
                        <th>Image</th>
                        <th style="width: 250px">Choose</th>
                      </tr>
                      @if (count($files) == 0)
                          <tr>
                            <td></td>
                            <td>Sorry no image found.</td>
                            <td></td>
                          </tr>
                      @else
                        @foreach ($files as $index => $file)
                        <tr>
                          <td>{{ $index }}</td>
                          <td>
                            <img src="{{ asset($file) }}" alt="Gambar" width="300px">    
                          </td>
                          <td>
                              <button class="btn btn-info choose" data-url="{{ asset($file) }}">Choose</button>
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
<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<script>
    $(document).on('click','.choose', function(){
        var url = $(this).attr('data-url');
        returnFileUrl(url);
    });
    // Helper function to get parameters from the query string.
    function getUrlParam( paramName ) {
        var reParam = new RegExp( '(?:[\?&]|&)' + paramName + '=([^&]+)', 'i' );
        var match = window.location.search.match( reParam );

        return ( match && match.length > 1 ) ? match[1] : null;
    }
    // Simulate user action of selecting a file to be returned to CKEditor.
    function returnFileUrl(url) {

        var funcNum = getUrlParam( 'CKEditorFuncNum' );
        var fileUrl = url;
        window.opener.CKEDITOR.tools.callFunction( funcNum, fileUrl );
        window.close();
    }
</script>
</body>
</html>

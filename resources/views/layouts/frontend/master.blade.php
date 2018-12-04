<!doctype html>
<html lang="id">

<head>
 <!-- Required meta tags -->
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=0.86, maximum-scale=3.0, minimum-scale=0.86">

 <!-- Bootstrap CSS -->
 <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css')}}" />
 <link rel="stylesheet" href="{{ asset('assets/css/all.min.css')}}" />
 <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}" />

 <title>{{ $setting->name }}</title>
</head>

<body>
 <!-- Container header -->
 <div class="container header">
  <!-- header -->
  <header class="navbar d-flex align-items-end p-0">
   <div class="header-logo mx-auto mx-lg-1" style="max-width:100%">
   <a href="{{ route('home') }}" class="navbar-brand">
     <img src="{{ asset($setting->logo) }}" alt="" srcset="">
    </a>
   </div>
   <nav class="mb-1 mx-auto mx-lg-1">
     @foreach ($menus as $menu)
        <a class="p-4 text-dark" href="{{ ($menu->data->status == 'page') ? route('page', $menu->data->link) : $menu->data->link }}">{{ $menu->name }}</a>
     @endforeach    
   </nav>
  </header>

  <!-- <hr class="my-0 bg-dark" /> -->
</div>


  @yield('content')


 <!-- Footer -->
 <div class="container py-1 pb-2">
  <footer class="footer">
   <div class="row">
    <div class="col-4">
     <address>{!! $setting->address !!}<br>
        {{ $setting->email }} </address>
    </div>
    <div class="col text-center">
     <ul class="list-unstyled list-inline text-black">
      <li class="list-inline-item"><a href="{{ $setting->fb }}"><i class="fab fa-facebook text-dark"></i></a></li>
      <li class="list-inline-item"><a href="{{ $setting->ig }}"><i class="fab fa-instagram text-dark"></i></a></li>
      <li class="list-inline-item"><a href="{{ $setting->yt }}"><i class="fab fa-youtube text-dark"></i></a></li>
     </ul>
    </div>
    <div class="col-4">
     <address class="text-right">Copyright &copy; {{ date('Y') }} - JungeArchitekt.id <br>
      Junge Architekt Studio<br>
      All Rights Reserved</address>
    </div>
   </div>
  </footer>
 </div>

 <!-- Optional JavaScript -->
 <!-- jQuery first, then Popper.js, then Bootstrap JS -->
 <script src="{{ asset('assets/js/jquery-3.3.1.slim.min.js') }}" ></script>
 <script src="{{ asset('assets/js/popper.min.js') }}" ></script>
 <script src="{{ asset('assets/js/bootstrap.min.js') }}" ></script>
 <!-- <script src="assets/js/jquery-cache.js"></script>
 <script>
  $(function () {
			$('.intro').firstVisitLoad({
				cookieName : 'homepage',
			});
		});
 </script> -->
</body>

</html>

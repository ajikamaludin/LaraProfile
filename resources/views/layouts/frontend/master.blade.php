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
 @yield('js')
 <!-- <script src="assets/js/jquery-cache.js"></script>
 <script>
  $(function () {
			$('.intro').firstVisitLoad({
				cookieName : 'homepage',
			});
		});
 </script> -->
 <script id="wpcp_disable_selection" type="text/javascript">
  //<![CDATA[
  var image_save_msg='You Can Not Save images!';
    var no_menu_msg='Context Menu disabled!';
    var smessage = "Content is protected !!";
  function disableEnterKey(e){
    if (e.ctrlKey){
       var key;
       if(window.event)
            key = window.event.keyCode;     //IE
       else
            key = e.which;     //firefox (97)
      //if (key != 17) alert(key);
       if (key == 97 || key == 65 || key == 67 || key == 99 || key == 88 || key == 120 || key == 26 || key == 85  || key == 86 || key == 83 || key == 43)
       {
            show_wpcp_message('You are not allowed to copy content or view source');
            return false;
       }else
         return true;
       }
  }
  function disable_copy(e){	
    var elemtype = e.target.nodeName;
    var isSafari = /Safari/.test(navigator.userAgent) && /Apple Computer/.test(navigator.vendor);
    elemtype = elemtype.toUpperCase();
    var checker_IMG = '';
    if (elemtype == "IMG" && checker_IMG == 'checked' && e.detail >= 2) {show_wpcp_message(alertMsg_IMG);return false;}
    if (elemtype != "TEXT" && elemtype != "TEXTAREA" && elemtype != "INPUT" && elemtype != "PASSWORD" && elemtype != "SELECT" && elemtype != "OPTION" && elemtype != "EMBED")
    {
      if (smessage !== "" && e.detail == 2)
        show_wpcp_message(smessage);
      
      if (isSafari)
        return true;
      else
        return false;
    }	
  }
  function disable_copy_ie(){
    var elemtype = window.event.srcElement.nodeName;
    elemtype = elemtype.toUpperCase();
    if (elemtype == "IMG") {show_wpcp_message(alertMsg_IMG);return false;}
    if (elemtype != "TEXT" && elemtype != "TEXTAREA" && elemtype != "INPUT" && elemtype != "PASSWORD" && elemtype != "SELECT" && elemtype != "OPTION" && elemtype != "EMBED")
    {
      //alert(navigator.userAgent.indexOf('MSIE'));
        //if (smessage !== "") show_wpcp_message(smessage);
      return false;
    }
  }	
  function reEnable(){
    return true;
  }
  document.onkeydown = disableEnterKey;
  document.onselectstart = disable_copy_ie;
  if(navigator.userAgent.indexOf('MSIE')==-1){
    document.onmousedown = disable_copy;
    document.onclick = reEnable;
  }
  function disableSelection(target){
      //For IE This code will work
      if (typeof target.onselectstart!="undefined")
      target.onselectstart = disable_copy_ie;
      
      //For Firefox This code will work
      else if (typeof target.style.MozUserSelect!="undefined")
      {target.style.MozUserSelect="none";}
      
      //All other  (ie: Opera) This code will work
      else
      target.onmousedown=function(){return false}
      target.style.cursor = "default";
  }
  //Calling the JS function directly just after body load
  window.onload = function(){disableSelection(document.body);};
  //]]>
  </script>
    <script id="wpcp_disable_Right_Click" type="text/javascript">
    //<![CDATA[
    document.ondragstart = function() { return false;}
    /* ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
    Disable context menu on images by GreenLava Version 1.0
    ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ */
        function nocontext(e) {
           return false;
        }
        document.oncontextmenu = nocontext;
    //]]>
    </script>
  <style>
  .unselectable {
    -moz-user-select:none;
    -webkit-user-select:none;
    cursor: default;
  }
  html{
    -webkit-touch-callout: none;
    -webkit-user-select: none;
    -khtml-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    -webkit-tap-highlight-color: rgba(0,0,0,0);
  }
  </style>
  <script id="wpcp_css_disable_selection" type="text/javascript">
    var e = document.getElementsByTagName('body')[0];
    if(e) {
      e.setAttribute('unselectable',on);
    }
  </script>
  
    <div id="wpcp-error-message" class="msgmsg-box-wpcp warning-wpcp hideme"><span>error: </span>Content is protected !!</div>
    <script>
    var timeout_result;
    function show_wpcp_message(smessage)
    {
      if (smessage !== "")
        {
        var smessage_text = '<span>Alert: </span>'+smessage;
        document.getElementById("wpcp-error-message").innerHTML = smessage_text;
        document.getElementById("wpcp-error-message").className = "msgmsg-box-wpcp warning-wpcp showme";
        clearTimeout(timeout_result);
        timeout_result = setTimeout(hide_message, 3000);
        }
    }
    function hide_message()
    {
      document.getElementById("wpcp-error-message").className = "msgmsg-box-wpcp warning-wpcp hideme";
    }
    </script>
    <style type="text/css">
    #wpcp-error-message {
        direction: ltr;
        text-align: center;
        transition: opacity 900ms ease 0s;
        z-index: 99999999;
    }
    .hideme {
        opacity:0;
        visibility: hidden;
    }
    .showme {
        opacity:1;
        visibility: visible;
    }
    .msgmsg-box-wpcp {
      border-radius: 10px;
      color: #555;
      font-family: Tahoma;
      font-size: 11px;
      margin: 10px;
      padding: 10px 36px;
      position: fixed;
      width: 255px;
      top: 50%;
        left: 50%;
        margin-top: -10px;
        margin-left: -130px;
        -webkit-box-shadow: 0px 0px 34px 2px rgba(242,191,191,1);
      -moz-box-shadow: 0px 0px 34px 2px rgba(242,191,191,1);
      box-shadow: 0px 0px 34px 2px rgba(242,191,191,1);
    }
    .msgmsg-box-wpcp span {
      font-weight:bold;
      text-transform:uppercase;
    }
    .error-wpcp {		background:#ffecec url('http://www.urbane.co.id/wp-content/plugins/wp-content-copy-protector/images/error.png') no-repeat 10px 50%;
      border:1px solid #f5aca6;
    }
    .success {
      background:#e9ffd9 url('http://www.urbane.co.id/wp-content/plugins/wp-content-copy-protector/images/success.png') no-repeat 10px 50%;
      border:1px solid #a6ca8a;
    }
    .warning-wpcp {
      background:#ffecec url('http://www.urbane.co.id/wp-content/plugins/wp-content-copy-protector/images/warning.png') no-repeat 10px 50%;
      border:1px solid #f5aca6;
    }
    .notice {
      background:#e3f7fc url('http://www.urbane.co.id/wp-content/plugins/wp-content-copy-protector/images/notice.png') no-repeat 10px 50%;
      border:1px solid #8ed9f6;
    }
      </style>
</body>

</html>

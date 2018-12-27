<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>@yield('title')</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/gsdk.css') }}" />

    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Grand+Hotel|Open+Sans:400,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ asset('css/pe-icon-7-stroke.css') }}" />
</head>

<body>
 <!-- Navbar -->
  <nav class="navbar navbar-ct-azure navbar-transparent" role="navigation">
      <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button id="menu-toggle" type="button" class="navbar-toggle">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar bar1"></span>
          <span class="icon-bar bar2"></span>
          <span class="icon-bar bar3"></span>
        </button>
        <a class="navbar-brand" href="#">
            <img src="{{ asset('image/kilala-logo-white.png') }}" alt="" />
        </a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse">

        <ul class="nav navbar-nav navbar-right">
              <li class="active">
                  <a href="#">
                       Trang chủ
                  </a>
              </li>
              <li>
                  <a href="#">
                       Giới thiệu
                  </a>
              </li>
              <li>
                  <a href="#">
                       Tour du lịch
                  </a>
              </li>
              <li>
                  <a href="#">
                       Liên hệ
                  </a>
              </li>
         </ul>

      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>


  <div class="wrapper">
       <div class="header-banner">
          <div class="header-image">
              <img src="{{ asset('image/parallax-text.jpg') }}" alt="" />
          </div>
      </div>
      <div class="section">
              <div class="container tim-container" style="max-width:800px; padding-top:100px">
                 <h1 class="text-center">Awesome looking header <br> just for my friends<small class="subtitle">This is like a small motto before the story.</small></h1>
                 <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                 <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                     <!--     end extras -->
              </div>
              <div class="space"></div>
      </div>
  </div> <!-- wrapper -->
  </body>


</body>

  <!--  jQuery and Bootstrap core files    -->
  <script src="{{ asset('js/jquery.js') }}"></script>
  <script src="{{ asset('js/jquery-ui.custom.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>

	<!--  Plugins -->
  <script src="{{ asset('js/gsdk-checkbox.js') }}"></script>
  <script src="{{ asset('js/gsdk-morphing.js') }}"></script>
  <script src="{{ asset('js/gsdk-radio.js') }}"></script>
  <script src="{{ asset('js/gsdk-bootstrapswitch.js') }}"></script>
  <script src="{{ asset('js/bootstrap-select.js') }}"></script>
  <script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
  <script src="{{ asset('js/jquery.tagsinput.js') }}"></script>
  <script src="{{ asset('js/chartist.min.js') }}"></script>
  <script src="{{ asset('js/get-shit-done.js') }}"></script>

    <!-- If you have retina @2x images on your server which can be sent to iPhone/iPad/MacRetina, please uncomment the next line, otherwise you can delete it -->
	<!-- <script src="assets/js/retina.min.js"></script> -->


</html>

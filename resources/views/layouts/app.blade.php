<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>@yield('title')</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
		<link rel="stylesheet" href="{{ asset('css/lightGallery.css') }}" />
		<link rel="stylesheet" href="{{ asset('css/lg-transitions.min.css') }}" />
		<link rel="stylesheet" href="{{ asset('css/tippy.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/gsdk.css') }}" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Grand+Hotel|Open+Sans:400,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ asset('css/pe-icon-7-stroke.css') }}" />
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-ct-azure navbar-transparent" role="navigation">
      <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button id="menu-toggle" type="button" class="navbar-toggle">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar bar1"></span>
          <span class="icon-bar bar2"></span>
          <span class="icon-bar bar3"></span>
        </button>
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('image/kilala-logo-white.png') }}" alt="" />
        </a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse">

        <ul class="nav navbar-nav navbar-right">
              <li class="{{ Route::is('home') ? 'active' : '' }}">
                  <a href="{{ url('/') }}">
                       Trang chủ
                  </a>
              </li>
              <li class="{{ Route::is('tours') || Route::is('tourDetails') || Route::is('tourRegistration') || Route::is('tourPaymentUpdateForm') || Route::is('thankYouPage') ? 'active' : '' }}">
                  <a href="{{ url('/tour-du-lich') }}">
                       Tour du lịch
                  </a>
              </li>
              <li>
                  <a href="{{ url('/#contact') }}">
                       Liên hệ
                  </a>
              </li>
         </ul>

      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>

  <div class="mainContent">
    @yield('topBanner')
    <div class="container">
      @yield('mainContent')
    </div>
		@yield('extraContent')
  </div>

  <footer class="footer footer-big">
          <div class="container">
              <div class="copyright">
                <div class="col-md-4">
                  <a href="https://www.online.gov.vn/CustomWebsiteDisplay.aspx?DocId=7941"><img src="https://songhantourist.com/upload/bocongthuong.png"></a>
                </div>
                <div class="col-md-8">
                      <p class="copyright text-center">
                        Bản quyền thuộc về Công ty TNHH TM Du Lịch và Dịch vụ Sông Hàn<br />
                        Giấy phép kinh doanh số 0400423715 do Sở Kế Hoạch và Đầu Tư TP. Đà Nẵng cấp ngày 27/05/2002
                      </p>
                </div>
              </div>
          </div>
  </footer>
</body>

  <!--  jQuery and Bootstrap core files    -->
  <script src="{{ asset('js/jquery.js') }}"></script>
  <script src="{{ asset('js/jquery-ui.custom.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('js/tippy.js') }}"></script>
	<script src="{{ asset('js/jquery.validate.min.js') }}"></script>
	<script src="{{ asset('js/additional-methods.min.js') }}"></script>
	<script src="{{ asset('js/messages_vi.min.js') }}"></script>
	<script src="{{ asset('js/lightgallery-all.min.js') }}"></script>

  <!-- lightgallery plugins -->
  <script src="{{ asset('js/lg-thumbnail.min.js') }}"></script>
  <script src="{{ asset('js/lg-fullscreen.min.js') }}"></script>

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
	@yield('pageScripts')

</html>

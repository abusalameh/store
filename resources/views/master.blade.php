<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title>@yield('page-head-title')</title>

	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="token" id="token" value="{{csrf_token()}}">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

	<!-- BEGIN CORE CSS -->
	<link rel="stylesheet" href="{{ asset('admin1/css/admin1.css')}}">
	<link rel="stylesheet" href="{{ asset('globals/css/elements.css')}}">
	<!-- END CORE CSS -->
	@yield('styles')
	<!-- BEGIN PLUGINS CSS -->
	<link rel="stylesheet" type="text/css" href="{{ asset('globals/plugins/bootstrap-table/dist/bootstrap-table.min.css')}}">
	<link rel="stylesheet" href="{{ asset('globals/css/plugins.css')}}">
	<!-- END PLUGINS CSS -->
	<link rel="stylesheet" href="{{asset('globals/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css')}}">
	<link rel="stylesheet" href="{{asset('globals/plugins/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css')}}">
	<link rel="stylesheet" href="{{ asset('css/sweetalert2.min.css')}}" charset="utf-8">
	<!-- BEGIN SHORTCUT AND TOUCH ICONS -->
	<link rel="shortcut icon" href="{{ asset('globals/img/icons/favicon.ico')}}">
	<link rel="apple-touch-icon" href="{{ asset('globals/img/icons/apple-touch-icon.png')}}">
	<!-- END SHORTCUT AND TOUCH ICONS -->

    <!-- BEGIN CUSTOM STYLES -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}" media="screen" title="no title" charset="utf-8">
    <!-- END CUSTOM STYLES -->
	<script src="{{ asset('globals/plugins/modernizr/modernizr.min.js') }}"></script>
	<style >
			.modal-body {
			max-height: 2500px;
		}
	</style>
</head>
<body class="layout-{{ trans('lang.direction') }} theme-teal fixed-footer" id="vue">

	<div class="nav-bar-container">

		<!-- BEGIN ICONS -->
		<div class="nav-menu">
			<div class="hamburger">
				<span class="patty"></span>
				<span class="patty"></span>
				<span class="patty"></span>
				<span class="patty"></span>
				<span class="patty"></span>
				<span class="patty"></span>
			</div><!--.hamburger-->
		</div><!--.nav-menu-->

		<!-- END OF ICONS -->

		<div class="nav-bar-border"></div><!--.nav-bar-border-->

		<!-- BEGIN OVERLAY HELPERS -->
		<div class="overlay">
			<div class="starting-point">
				<span>Hel</span>
			</div><!--.starting-point-->
			<div class="logo">R A S Pro</div><!--.logo-->
		</div><!--.overlay-->

		<div class="overlay-secondary"></div><!--.overlay-secondary-->
		<!-- END OF OVERLAY HELPERS -->

	</div><!--.nav-bar-container-->

	<div class="content" id="vue-app">

		<div class="page-header full-content">
			<div class="row">
			<!-- trans('lang.page-direction')}} -->
				<div class="col-sm-12 ">
                    <div class="text-{{trans('lang.page-direction')}}">
                        @yield('page-title')
                        <!-- <h1 class="{{ trans('lang.direction') }}-font"> لوحة التحكم <small>لوحة التحكم الرئيسية</small> <i class="fa fa-dashboard"></i></h1> -->
                    </div>
				</div><!--.col-->
			</div><!--.row-->
		</div><!--.page-header-->

		<!-- content -->
				@yield('content')
		<!-- content -->

		{{-- <div class="footer margin-top-40">
			<div class="row no-gutters">
				<div class="col-xs-12 bg-teal">
					<span class="{{ trans('lang.direction') }}-font">جميع الحقوق محفوظة</span>
				</div><!--.col-->
			</div><!--.row-->
		</div><!--.footer-links--> --}}

	</div><!--.content-->

	<div class="layer-container">

		<!-- BEGIN MENU LAYER -->
		<div class="menu-layer">
			@include('partials.menu')
		</div><!--.menu-layer-->
		<!-- END OF MENU LAYER -->


	</div><!--.layer-container-->
	{{-- <footer style="background-color:#009587;height:90px;color:white;padding-bottom:0px;padding-top:30px" >
		<div class="row" >
			<div class="col-md-12" >
				<p class="text-lead text-center">
					all right reserved
				</p>
			</div>
		</div>
	</footer> --}}
	<!-- BEGIN GLOBAL AND THEME VENDORS -->
	<script src="{{ asset('globals/js/global-vendors.js') }}"></script>
	<!-- END GLOBAL AND THEME VENDORS -->

	<!-- BEGIN PLUGINS AREA -->
	<!-- END PLUGINS AREA -->

	<!-- PLUGINS INITIALIZATION AND SETTINGS -->
	<!-- END PLUGINS INITIALIZATION AND SETTINGS -->

	<!-- PLEASURE -->
	<script src="{{ asset('globals/js/pleasure.js' )}}"></script>
	<!-- ADMIN 1 -->
	<script src="{{ asset('admin1/js/layout.js') }}"></script>
	<!-- Vue & Vue-Resource -->
	<script src="{{ asset('js/vendor.js') }}"></script>
	<script src="{{ asset('js/filters.js') }}"></script>
	<script src="{{ asset('js/vue-validator/dist/vue-validator.min.js') }}"></script>
	<script src="{{ asset('globals/plugins/bootstrap-daterangepicker/daterangepicker.js' )}}"></script>
	<script src="{{ asset('globals/scripts/forms-pickers.js')}}"></script>
	<script src="{{ asset('js/sweetalert2.min.js')}}"></script>
	{{-- <script src="{{ asset('js/select2.min.js')}}"></script> --}}
	{{-- <script src="{{ asset('js/chosen.jquery.min.js')}}"></script> --}}

	<!-- BEGIN INITIALIZATION-->
	<script>

	$(document).ready(function () {

		alert = function (title,message,type ){
			swal(
				  title,
				  message,
				  type
			  );
	  };
		Pleasure.init();
		Layout.init();
		FormsPickers.init();
	});
	</script>

	<!-- END INITIALIZATION-->
	@stack('scripts')

</body>
</html>

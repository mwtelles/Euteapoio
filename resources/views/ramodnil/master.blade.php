<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title>Painel | euteapoio</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<meta http-equiv="pragma" content="no-cache" />
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
	<link rel="stylesheet" href="{{ asset('css/azzara.min.css') }}">
	<link rel="stylesheet" href="{{asset('fonts/flaticon/flaticon.css')}}">
	<link rel="stylesheet" href="css/demos/demo-seo.css">
	<!-- Favicon -->
	<link rel="shortcut icon" href="/img/eu-te-apoio-logo.png" type="image/x-icon" />
	<link rel="apple-touch-icon" href="/img/eu-te-apoio-logo.png">

	<!-- Mobile Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">

	<link rel="manifest" href="https://euteapoio.com/manifest.json">
	@laravelPWA
	@yield('adminlte_css')
</head>

<body class="hold-transition sidebar-mini @yield('body_class')">

	@yield('body')

	<script src="{{ asset('js/app.js'.'?'.(random_int(100, 999))) }}"></script>
	<!--   Core JS Files   -->

	<script src="{{asset('js/core/popper.min.js')}}"></script>
	<!-- jQuery UI -->
	<script src="{{asset('js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js')}}"></script>
	<script src="{{asset('js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js')}}"></script>

	<!-- jQuery Scrollbar -->
	<script src="{{asset('js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>

	<!-- Moment JS -->
	<script src="{{asset('js/plugin/moment/moment.min.js')}}"></script>

	<!-- Chart JS -->
	<script src="{{asset('js/plugin/chart.js/chart.min.js')}}"></script>

	<!-- jQuery Sparkline -->
	<script src="{{asset('js/plugin/jquery.sparkline/jquery.sparkline.min.js')}}"></script>

	<!-- Chart Circle -->
	<script src="{{asset('js/plugin/chart-circle/circles.min.js')}}"></script>

	<!-- Bootstrap Notify -->
	<script src="{{asset('js/plugin/bootstrap-notify/bootstrap-notify.min.js')}}"></script>

	<!-- Bootstrap Toggle -->
	<script src="{{asset('js/plugin/bootstrap-toggle/bootstrap-toggle.min.js')}}"></script>

	<!-- jQuery Vector Maps -->
	<script src="{{asset('js/plugin/jqvmap/jquery.vmap.min.js')}}"></script>
	<script src="{{asset('js/plugin/jqvmap/maps/jquery.vmap.world.js')}}"></script>

	<!-- Google Maps Plugin -->
	<script src="{{asset('js/plugin/gmaps/gmaps.js')}}"></script>

	<!-- Sweet Alert -->
	<script src="{{asset('js/plugin/sweetalert/sweetalert.min.js')}}"></script>

	<!-- Azzara JS -->
	<script src="{{asset('js/ready.min.js')}}"></script>
	
	@yield('adminlte_js')
</body>

</html>
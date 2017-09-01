<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
				<title>{{ $setting->meta_title }} | @yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

				<link rel='shortcut icon' type='image/x-icon' href="{{ asset('contents/'.$setting->favicon) }}" />

        <!-- C3 charts css -->
        <link href="{{ asset('admin') }}/plugins/c3/c3.min.css" rel="stylesheet" type="text/css"  />

        <!-- App css -->
        <link href="{{ asset('admin') }}/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin') }}/assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin') }}/assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin') }}/assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin') }}/assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin') }}/assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin') }}/assets/css/responsive.css" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin') }}/plugins/sweet-alert2/sweetalert2.min.css" rel="stylesheet" type="text/css">
				@stack('style')
        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="{{ asset('admin') }}/assets/js/modernizr.min.js"></script>

				@php
					$privilege = $privilege->where('id',auth()->user()->privilege_id)->firstOrFail();
					$role = $role->where('privilege_id',$privilege->id)->firstOrFail()
				@endphp

    </head>
		<body>
				@include('includes.navigation')
				<div class="wrapper">
						<div class="container">
								@yield('content')
						</div>
				</div>
				<!-- jQuery  -->
				<script src="{{ asset('admin') }}/assets/js/jquery.min.js"></script>
				<script src="{{ asset('admin') }}/assets/js/bootstrap.min.js"></script>
				<script src="{{ asset('admin') }}/assets/js/waves.js"></script>
				<script src="{{ asset('admin') }}/assets/js/jquery.slimscroll.js"></script>
				<script src="{{ asset('admin') }}/assets/js/jquery.scrollTo.min.js"></script>

				<!-- Counter js  -->
				<script src="{{ asset('admin') }}/plugins/waypoints/jquery.waypoints.min.js"></script>
				<script src="{{ asset('admin') }}/plugins/counterup/jquery.counterup.min.js"></script>

				<!--C3 Chart-->
				<script type="text/javascript" src="{{ asset('admin') }}/plugins/d3/d3.min.js"></script>
				<script type="text/javascript" src="{{ asset('admin') }}/plugins/c3/c3.min.js"></script>

				<!--Echart Chart-->
				<script src="{{ asset('admin') }}/plugins/echart/echarts-all.js"></script>

				<!-- Dashboard init -->
				<script src="{{ asset('admin') }}/assets/pages/jquery.dashboard.js"></script>

				<!-- App js -->
				<script src="{{ asset('admin') }}/assets/js/jquery.core.js"></script>
				<script src="{{ asset('admin') }}/assets/js/jquery.app.js"></script>
        <script src="{{ asset('admin') }}/plugins/sweet-alert2/sweetalert2.min.js"></script>

				@stack('javascript')
        <script>
            $('#demo-dt-basic').dataTable();
        </script>
		</body>
</html>

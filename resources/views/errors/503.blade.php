<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.themeon.net/nifty/v2.2/pages-503.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 24 Apr 2015 10:45:35 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Error 503 | WebCSR</title>

	<!--STYLESHEET-->
	<!--=================================================-->
	<!--Open Sans Font [ OPTIONAL ] -->
 	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&amp;subset=latin" rel="stylesheet">
	<!--Bootstrap Stylesheet [ REQUIRED ]-->
	<link href="{{ url('admin') }}/css/bootstrap.min.css" rel="stylesheet">
	<!--Nifty Stylesheet [ REQUIRED ]-->
	<link href="{{ url('admin') }}/css/nifty.min.css" rel="stylesheet">
	<!--Font Awesome [ OPTIONAL ]-->
	<link href="{{ url('admin') }}/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">

	<!--SCRIPT-->
	<!--=================================================-->
	<!--Page Load Progress Bar [ OPTIONAL ]-->
	<link href="{{ url('admin') }}/plugins/pace/pace.min.css" rel="stylesheet">
	<script src="{{ url('admin') }}/plugins/pace/pace.min.js"></script>
</head>

<body>
	<div id="container" class="cls-container">

		<!-- HEADER -->
		<!--===================================================-->
		<div class="cls-header">
			<div class="cls-brand">
				<a class="box-inline" href="index.html">
					<!-- <img alt="Nifty Admin" src="images/logo.png" class="brand-icon"> -->
					<span class="brand-title">Web <span class="text-thin">CSR</span></span>
				</a>
			</div>
		</div>

		<!-- CONTENT -->
		<!--===================================================-->
		<div class="cls-content">
			<h1 class="error-code text-warning">503</h1>
			<p class="h4 text-thin pad-btm mar-btm">
				<i class="fa fa-exclamation-circle fa-fw"></i>
                Something went wrong and server couldn't process your request.
			</p>
			<div class="row mar-btm">
				<form class="col-xs-12 col-sm-10 col-sm-offset-1" method="post" action="#">
					<input type="text" placeholder="Search.." class="form-control input-lg error-search">
				</form>
			</div>
			<br>
			<div class="pad-top"><a class="btn-link" href="{{ url('/') }}">Back to Homepage</a></div>
		</div>

	</div>
	<!--===================================================-->
	<!-- END OF CONTAINER -->

	<!--JAVASCRIPT-->
	<!--=================================================-->
	<!--jQuery [ REQUIRED ]-->
	<script src="{{ url('admin') }}/js/jquery-2.1.1.min.js"></script>
	<!--BootstrapJS [ RECOMMENDED ]-->
	<script src="{{ url('admin') }}/js/bootstrap.min.js"></script>
	<!--Fast Click [ OPTIONAL ]-->
	<script src="{{ url('admin') }}/plugins/fast-click/fastclick.min.js"></script>
	<!--Nifty Admin [ RECOMMENDED ]-->
	<script src="{{ url('admin') }}/js/nifty.min.js"></script>

</body>
</html>

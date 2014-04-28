<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>InfoTrack | Younger Associates</title>
	<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

	<link href="/assets/css/styles.css" rel="stylesheet" type="text/css"/>

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
	<![endif]-->
</head>
<body class="skin-green fixed">
<!-- header logo: style can be found in header.less -->
<header class="header">
	<a href="/" class="logo">
		<!-- Add the class icon to your logo image or logo icon to add the margining -->
		<img src="/assets/img/ya-logo.png" alt=""/> InfoTrack
	</a>

	@include('_partials.header-nav')

</header>
<div class="wrapper row-offcanvas row-offcanvas-left">

	@include('_partials.sidebar-nav')

	<!-- Right side column. Contains the navbar and content of the page -->
	<aside class="right-side">

		@yield('content')

	</aside>
	<!-- /.right-side -->
</div>
<!-- ./wrapper -->

<script src="/assets/js/min/app-ck.js" type="text/javascript"></script>

</body>
</html>
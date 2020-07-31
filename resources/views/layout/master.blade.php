<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>@yield('title')</title>
	<meta charset="UTF-8">
	<meta name="description" content="LMS">
	<meta name="keywords" content="lms, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i&display=swap" rel="stylesheet">
 
	<!-- Stylesheets -->
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="../assets/css/font-awesome.min.css"/>
	<link rel="stylesheet" href="../assets/css/owl.carousel.min.css"/>
	<link rel="stylesheet" href="../assets/css/slicknav.min.css"/>

	<!-- Main Stylesheets -->
	<link rel="stylesheet" href="../assets/css/style.css"/>


	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body style="background-color:#0a183d;">
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

    @yield('content')
	
	<!--====== Javascripts & Jquery ======-->
	<script src="../assets/js/jquery-3.2.1.min.js"></script>
	<script src="../assets/js/bootstrap.min.js"></script>
	<script src="../assets/js/jquery.slicknav.min.js"></script>
	<script src="../assets/js/owl.carousel.min.js"></script>
	<script src="../assets/js/mixitup.min.js"></script>
	<script src="../assets/js/main.js"></script>

	</body>
</html>





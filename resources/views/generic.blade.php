<!DOCTYPE HTML>
<!--
	Alpha by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Tambo - Play and Win | @yield('title')</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="{{asset('/js/ie/html5shiv.js')}}"></script><![endif]-->
		<link rel="stylesheet" href="{{asset('/css/main.css')}}" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap-grid.min.css" crossorigin="anonymous">
        <link rel="stylesheet" href="{{asset('/css/cm.css')}}" />
		<!--[if lte IE 8]><link rel="stylesheet" href="{{asset('/css/ie8.css')}}" /><![endif]-->
        
	</head>
	<body ng-app="tambo">
		<div id="page-wrapper">

			<!-- Header -->
				<header id="header">
					<h1><a href="/">Tambo</a> - Play and Win</h1>
					<nav id="nav">
						<ul>
							<li><a href="/">Home</a></li>
							<li>
								<a href="#" class="icon fa-angle-down">Menu</a>
								<ul>
									<li><a href="/deposit">Deposit</a></li>
									<li><a href="/withdraw">Withdraw</a></li>
									<li><a href="/signout">Sign Out</a></li>
								</ul>
							</li>
							<li><a href="#" class="button">Sign Up</a></li>
						</ul>
					</nav>
				</header>

			<!-- Main -->
				<section id="main" class="container">
                     @yield('content')
				</section>

			<!-- Footer -->
				<footer id="footer">
					<ul class="icons">
						<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
						<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
						<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
						<li><a href="#" class="icon fa-github"><span class="label">Github</span></a></li>
						<li><a href="#" class="icon fa-dribbble"><span class="label">Dribbble</span></a></li>
						<li><a href="#" class="icon fa-google-plus"><span class="label">Google+</span></a></li>
					</ul>
					<ul class="copyright">
						<li>&copy; Untitled. All rights reserved.</li><!--li>Design: <a href="http://html5up.net">HTML5 UP</a></li-->
					</ul>
				</footer>

		</div>

		<!-- Scripts -->
			<script src="{{asset('/js/jquery.min.js')}}"></script>
			<script src="{{asset('/js/jquery.dropotron.min.js')}}"></script>
			<script src="{{asset('/js/jquery.scrollgress.min.js')}}"></script>
			<script src="{{asset('/js/skel.min.js')}}"></script>
			<script src="{{asset('/js/util.js')}}"></script>
			<!--[if lte IE 8]><script src="{{asset('/js/ie/respond.min.js')}}"></script><![endif]-->
			<script src="{{asset('/js/main.js')}}"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.5/angular.min.js"></script>
            <script src="{{asset('/js/app.js')}}"></script>

	</body>
</html>
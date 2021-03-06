<!DOCTYPE HTML>
<html>
	<head>
		<script src="http://code.jquery.com/jquery-2.2.0.js"></script>
		<title>Get Starteds</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body class="no-sidebar">
		<div id="page-wrapper">

			<!-- Header -->
				<div id="header-wrapper" class="wrapper">
					<div id="header">

						<!-- Logo -->
							<!-- <div id="logo">
								<h1><a href="index.html">Get Started</a></h1>
							</div> -->

						<!-- Nav -->
							<nav id="nav">
								<ul>
									<li class="current"><a href="index.html">Home</a></li>
									<li><a href="getStarted.html">Get Started</a></li>
									<li><a href="createPost.html">Create Post</a></li>
									<li><a href="findRide.html">Find A Ride</a></li>
									<li><a href="#">About Us</a></li>
									<li><a href="#">Sign In</a></li>
								</ul>
							</nav>

					</div>
				</div>

			<!-- Main -->
				<div class="wrapper style2">
					<div class="title">Sign In!</div>
					<div id="main" class="container">
						<div align="center">
						<!-- <form action="scripts/create_account_script.php" method="post"> -->
						<form id="form_sign_in" name="form_create_account" method="post" action="">
						<h2> Sign In </h2>
								<!-- <form action="scripts/create_account_script.php" method="post"> -->
								<table class="form_table" width="450px">
									<tr>
										<td>
											<label for="username">Username</label>
										</td>
										<td>
											<input type="text" name="username" maxlength="50" size="20">
										</td>
									</tr>
									<tr>
										<td>
											<label for="password">Password</label>
										</td>
										<td>
											<input type="password" name="password" maxlength="50" size="20">
										</td>
									</tr>
								</table>

								<p id="error_message"></p>
								<input type="submit" value = "Sign In" id = "btn_submit" name = "btn_submit"> <!-- <a href="LoggedIn.html"></a> -->


								<?php
									if (isset($_POST['btn_submit'])){
										include 'scripts/log_in_script.php';
									}
								?>

							</form>
							</div>
					</div>
				</div>

			<!-- Footer -->
				<div id="footer-wrapper" class="wrapper">
					<div id="footer" class="container">
						<hr />
					</div>
				</div>

		<!-- Scripts -->

			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/skel-viewport.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>

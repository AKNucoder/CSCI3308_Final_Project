<!DOCTYPE HTML>
<html>
	<head>
		<title>Get Started</title>
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
									<li><a href="#">Create Post</a></li>
									<li><a href="#">Find A Ride</a></li>
									<li><a href="#">About Us</a></li>
									<li><a href="#">Sign In</a></li>
								</ul>
							</nav>

					</div>
				</div>

			<!-- Main -->
				<div class="wrapper style2">
					<div class="title">Get Started!</div>
					<div id="main" class="container">
						<div class="form_container" align="center">
							<h2> Sign Up For an Account </h2>
						<!-- <form action="scripts/create_account_script.php" method="post"> -->
						<form id="form_create_account" name="form_create_account" method="post" action="">
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
									<tr>
										<td>
											<label for="confirm_password">Confirm Password</label>
										</td>
										<td>
											<input type="password" name="confirm_password" maxlength="50" size="20">
										</td>
									</tr>
									<tr>
										<td>
											<label for="first_name">First Name</label>
										</td>
										<td>
											<input type="text" name="first_name" maxlength="50" size="20">
										</td>
									</tr>
									<tr>
										<td>
											<label for="last_name">Last Name</label>
										</td>
										<td>
											<input type="text" name="last_name" maxlength="50" size="20">
										</td>
									</tr>

									<tr>
										<td>
											<label for="email">Email</label>
										</td>
										<td>
											<input type="text" name="email" maxlength="80" size="20">
										</td>
									</tr>
									<tr>
										<td>
											<label for="phone_no">Cell</label>
										</td>
										<td>
											<input type="text" name="phone_no" maxlength="10" size="20">
										</td>
									</tr>

									<tr>
										<td>
											<label for="city">City</label>
										</td>
										<td>
											<input type="text" name="city" maxlength="50" size="20">
										</td>
									</tr>

									<tr>
										<td>
											<label for="state">State</label>
										</td>
										<td>
											<input type="text" name="state" value="CO" readonly maxlength="2" size="20">
										</td>
									</tr>

									<tr>
										<td>
											<label for="zip">Zip</label>
										</td>
										<td>
											<input type="text" name="zip"  maxlength="5" size="20">
										</td>
									</tr>

								</table>

								<p id="error_message"></p>
								<input type="submit" value = "Create Account" id = "btn_submit" name = "btn_submit"> <!-- <a href="LoggedIn.html"></a> -->


								<?php
									if (isset($_POST['btn_submit'])){
										include 'scripts/create_account_script.php';
									}
								?>
							</form>
							</div>
					</div>
				</div>

			<!-- Footer -->
				<div id="footer-wrapper" class="wrapper">
					<div class="title">The Rest Of It</div>
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

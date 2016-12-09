<!DOCTYPE HTML>
<html>
	<head>
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

							<nav id="nav">
								<ul>
									<li class="current"><a href="index.html">Home</a></li>
									<li><a href="getStarted.php">Get Started</a></li>
									<li><a href="createPost.php">Create Post</a></li>
									<li><a href="findRide.php">Find A Ride</a></li>
									<li><a href="#">About Us</a></li>
									<li><a href="signIn.php">Sign In</a></li>
								</ul>
							</nav>

					</div>
				</div>

			<!-- Main -->
				<div class="wrapper style2">
					<div class="title">Create Ride Posting!</div>
					<div id="main" class="container">
						<div align="center">
						<!-- <form action="scripts/create_account_script.php" method="post"> -->
						<form id="form_create_account" name="form_create_account" method="post" action="">
						<h2> Enter Event Details! </h2>
								<!-- <form action="scripts/create_account_script.php" method="post"> -->
								<table class="form_table" width="450px">
									<tr>
										<td>
											<label for="title">Title</label>
										</td>
										<td>
											<input type="text" name="title" maxlength="50" size="41">
										</td>
									</tr>
									<tr>
										<td>
											<label for="description">Description</label>
										</td>
										<td>
											<textarea name="description" maxlength="600" cols="40" rows="3"></textarea>
										</td>
									</tr>

									<tr>
										<td>
											<div>Event Date</div>
										</td>
					    				<td colspan="10">
					    					<select name="month_of_event" id="month_of_event">
					    						<?php
					    						for ($month=1; $month<=12;$month++){
													 echo '<option value="'.$month.'">'.$month.'</option>';
												}
												?>
					    					</select>
					    					/
					    					<select name="day_of_event" id="day_of_event">
					    						<?php
					    						for ($day=1; $day<=31;$day++){
													 echo '<option value="'.$day.'">'.$day.'</option>';
												}
												?>
					    					</select>
					    					/
					    					<select name="day_of_year" id="day_of_year">
												<?php
												$current_year = date('Y');
					    						for ($year=$current_year; $year<=($current_year+1);$year++){
													 echo '<option value="'.$year.'">'.$year.'</option>';
												}
												?>
					    					</select>
					    				</td>
									</tr>
									<tr>
										<td>
											<div>Event Time</div>
										</td>
					    				<td colspan="10">
					    					<select name="hour_of_event" id="hour_of_event">
					    						<?php
					    						for ($hour=0; $hour<=24;$hour++){
													 echo '<option value="'.$hour.'">'.$hour.'</option>';
												}
												?>
					    					</select>
					    					:
					    					<select name="minute_of_event" id="minute_of_event">
					    						<?php
					    						for ($minute=0; $minute<=5;$minute++){
													 echo '<option value="'.$minute.'">'.$minute.'0</option>';
												}
												?>
					    					</select>
					    				</td>
									</tr>
									<tr>
										<td>
											<label for="tags">Tags</label>
										</td>
										<td>
											<input type="text" name="last_name" maxlength="50" size="20">
										</td>
									</tr>
								</table>

								<p id="error_message"></p>
								<input type="submit" value = "Post" id = "btn_submit" name = "btn_submit"> <!-- <a href="LoggedIn.html"></a> -->


								<?php
									if (isset($_POST['btn_submit'])){
										include 'scripts/post_an_entry_script.php';
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
						<hr />

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

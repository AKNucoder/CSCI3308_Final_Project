<?php
// Start the session - http://www.w3schools.com/php/php_sessions.asp
session_start();
?>
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
	<?PHP
		//File names
		include 'scripts/file_names.php';
	  //include 'scripts/retrieve_rides_list.php';

	?>
	<body class="no-sidebar">
		<div id="page-wrapper">

			<!-- Header -->
				<div id="header-wrapper" class="wrapper">
					<?PHP
						//echo $_SESSION["user_id"];

						//If logged in, let the user view the page, else do not let them
						if (isset($_SESSION["user_id"]) && intval($_SESSION["user_id"]) > 0){

						}
						else{
							?>
							<script type="text/javascript">
								alert("Please Sign-In or Create an Account!");
								// window.location.assign("GetStarted.php");
						    </script>;
						    <?PHP
						}
					?>
					<div id="header">

							<nav id="nav">
								<ul>
									<li class="current"><a href="index.php">Home</a></li>
									<li><a href="getStarted.php">Get Started</a></li>
									<li><a href="createPost.html">Create Post</a></li>
									<li><a href="findRide.php">Find A Ride</a></li>
									<li><a href="#">About Us</a></li>
									<li><a href="signIn.php">Sign In</a></li>
								</ul>
							</nav>

					</div>
				</div>

			<!-- Main -->
				<div class="wrapper style2">
					<div class="title">Find A Ride!</div>
					<div id="main" class="container">
						<div align="center">
						<!-- <form action="scripts/create_account_script.php" method="post"> -->
						<form id="form_create_account" name="form_create_account" method="post" action="">
						<h2> Find a Ride</h2>
								Sort By: <select name="sort" id="sort">
					          <option value="Date">Date</option>;
					          <option value="Title">Title</option>;
					          <option value="Zip">Zip</option>;
					        </select>
					        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
					        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
					        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
					      <!--<label for="password">Search:</label>-->
					      <input type="text" name="search" maxlength="50" size="20">
					      <input type="submit" value = "Search" id = "btn_search" name = "btn_search">

					      <!-- <form action="scripts/create_account_script.php" method="post"> -->
							<table id="main_table" width="600px" border ="2">
									<br>
									<tr>
					          <td>
					            Event
					          </td>
					          <td>
					            Description
					          </td>
					          <td>
					            Date:
					          </td>
					          <td>
					          </td>
					        </tr>

					        <?php
					          //include 'scripts/retrieve_rides_list.php';
					          //print_rides();

					          //Search for all rides and keep printing all the results as rows in the table
					          //http://php.net/manual/en/function.mysql-fetch-array.php

					          //$search_query_all_rides="SELECT *
					                       // FROM ". TABLE_USER_ENTRY . ";";
					          //$result = mysql_query($search_query_all_rides);
					          ?>


					          <div class="rides_list">
					          <?php
					          include 'scripts/retrieve_rides_list.php';
					          ?>
					          </div>


					          <?PHP
					          /*
					          while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
					                printf("ID: %s  Name: %s", $row[0], $row[1]);
					                echo'
					               <tr height:"200">
					                    <td>'.
					                      $row[ATTRIBUTE_TITLE]
					                    .'</td>
					                    <td>
					                      <a href="url" color="blue">'.$row[ATTRIBUTE_DESCRIPTION].'</a>
					                    </td>
					                    <td>'.
					                      substr($row[ATTRIBUTE_EVENT_DATE],0,10)
					                      .'&nbsp&nbsp&nbsp&nbsp
					                    </td>
					                    <td>
					                      <input type="submit" value = "See More" id = "btn_submit" name = "btn_submit">
					                    </td>

					                  </tr>
					                  ';
					          }
					          */
					          //mysql_free_result($result);
					        ?>


					        <!--
					        <tr height:"200">
					          <td>
					            Houston Rockets vs Denver Nuggets, CO
					          </td>
					          <td>
					            <a href="url" color="blue">Planning on leaving 2 hours early. Must live near South Denver to come. </a>
					          </td>
					          <td>
					            12/2/16&nbsp&nbsp&nbsp&nbsp
					          </td>
					          <td>
					            <input type="submit" value = "See More" id = "btn_submit" name = "btn_submit">
					          </td>

					        </tr>

					        <tr height:"200">
					          <td>
					            Houston Rockets vs Denver Nuggets, CO
					          </td>
					          <td>
					            <a href="url" color="blue">Planning on leaving 2 hours early. Must live near South Denver to come. </a>
					          </td>
					          <td>
					            12/2/16&nbsp&nbsp&nbsp&nbsp
					          </td>
					          <td>
					            <input type="submit" value = "See More" id = "btn_submit" name = "btn_submit">
					          </td>

					        </tr>
					      -->
								</table>

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

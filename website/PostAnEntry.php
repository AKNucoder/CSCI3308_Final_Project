<!DOCTYPE html>
<html>
<script src="http://code.jquery.com/jquery-2.2.0.js"></script>
<title>Kookaburra Incorporated's Carpool Connections</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Lato", sans-serif}
.w3-navbar,h1,button {font-family: "Montserrat", sans-serif}
.fa-anchor,.fa-coffee {font-size:200px}
</style>
<?PHP
	//File names
	include 'scripts/file_names.php'
?>
<body>

<!-- Navbar -->
<div class="w3-top">
  <ul class="w3-navbar w3-red w3-card-2 w3-left-align w3-large">
    <li class="w3-hide-medium w3-hide-large w3-opennav w3-right">
      <a class="w3-padding-large w3-hover-white w3-large w3-red" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    </li>
    <?php
    	echo '<li class="w3-hide-small"><a href="#" class="w3-padding-large w3-hover-white" onclick="location.href=\''.HOME_PAGE.'\'">Home</a></li>';
    	echo '<li class="w3-hide-small"><a href="#" class="w3-padding-large w3-hover-white" onclick="location.href=\''.GET_STARTED.'\'">Get Started</a></li>';
    	echo '<li class="w3-hide-small"><a href="#" class="w3-padding-large w3-hover-white" onclick="location.href=\''.ABOUT_US.'\'">About Us</a></li>';
    	echo '<li class="w3-hide-small"><a href="#" class="w3-padding-large w3-hover-white" onclick="location.href=\''.LOG_IN.'\'">Sign In</a></li>';
    	echo '<li><a href="#" class="w3-padding-large w3-white" onclick="location.href=\''.MAKE_A_POST.'\'">Create a Post</a></li>';
        echo '<li class="w3-hide-small"><a href="#" class="w3-padding-large w3-hover-white" onclick="location.href=\''.FIND_A_RIDE.'\'">Find a Ride</a></li>';

    ?>
  </ul>

  <!-- Navbar on small screens -->
  <div id="navDemo" class="w3-hide w3-hide-large w3-hide-medium">
    <ul class="w3-navbar w3-left-align w3-large w3-black">
      <li><a class="w3-padding-large" onclick="location.href='AboutUs.html'">About Us</a></li>
    </ul>
  </div>
</div>

<!-- Header -->
<header class="w3-container w3-red w3-center w3-padding-128">
  <div align="center">
	<!-- <form action="scripts/create_account_script.php" method="post"> -->
	<form id="form_create_account" name="form_create_account" method="post" action="">
	<h2> Make a Posting! </h2>
			<!-- <form action="scripts/create_account_script.php" method="post"> -->
			<table width="450px">
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

</header>


<!-- Footer -->
<footer class="w3-container w3-padding-64 w3-center w3-opacity">
  <div class="w3-xlarge w3-padding-32">
   <a href="#" class="w3-hover-text-indigo"><i class="fa fa-facebook-official"></i></a>
   <a href="#" class="w3-hover-text-light-blue"><i class="fa fa-twitter"></i></a>
   <a href="#" class="w3-hover-text-indigo"><i class="fa fa-linkedin"></i></a>
 </div>
</footer>

<script>
// Used to toggle the menu on small screens when clicking on the menu button
function myFunction() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else {
        x.className = x.className.replace(" w3-show", "");
    }
}
</script>

</body>
</html>


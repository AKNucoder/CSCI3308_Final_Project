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
table, th, td {
    border: 0px solid white;
    border-bottom: 1px solid white;
    border-collapse: collapse;
}

td{
	height: 75px;
}
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
    	echo '<li class="w3-hide-small"><a href="#" class="w3-padding-large w3-hover-white" onclick="location.href=\''.MAKE_A_POST.'\'">Create a Post</a></li>';
    	echo '<li><a href="#" class="w3-padding-large w3-white" onclick="location.href=\''.FIND_A_RIDE.'\'">Find a Ride</a></li>';
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
	<h2> Find a Ride</h2>
			<!-- <form action="scripts/create_account_script.php" method="post"> -->
			Sort By: <select name="sort" id="sort"> 
    			<option value="Date">Date</option>;
    			<option value="Title">Title</option>;
    			<option value="Zip">Zip</option>;
    		</select>
    		&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    		&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    		&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
			<!--<label for="password">Search:</label>-->
			<input type="password" name="password" maxlength="50" size="20">
			<input type="submit" value = "Search" id = "btn_submit" name = "btn_submit">
				<table width="600px" border="2">
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

				<tr>
					<td>
						Clay Walkers at Denver, CO  
					</td>
					<td>
						Limited seating. Requiring passengers to pay 2/3 of parking + gas. Flexible on time to leave after event (up to 90 mins after). 					
					</td>
					<td>
						12/5/16
					</td>
					<td>
						<input type="submit" value = "See More" id = "btn_submit" name = "btn_submit">
					</td>
				</tr>

				<tr>
					<td>
						Led Zep Cover, Red Rocks, CO 
					</td>
					<td>
						Planning on staying ~1 hour longer than we get out (6-7 pm).  
					</td>
					<td>
						12/5/16
					</td>
					<td>
						<input type="submit" value = "See More" id = "btn_submit" name = "btn_submit">
					</td>
				</tr>
				<tr>
					<td>
						Three Dog Night at Aspen, CO  
					</td>
					<td>
						Not planning on staying the entire time. Can come if you pay for parking completely. 					
					</td>
					<td>
						12/7/16
					</td>
					<td>
						<input type="submit" value = "See More" id = "btn_submit" name = "btn_submit">
					</td>
				</tr>
				<tr>
					<td>
						Snoop Dog in Loveland, CO   
					</td>
					<td>
						As the title says, Snoop Dog in Loveland. ~ 25 Miles South from event. If your on the way, Ill pick you for no extra cost, otherwise Im pretty negotiable. 					
					</td>
					<td>
						12/13/16
					</td>
					<td>
						<input type="submit" value = "See More" id = "btn_submit" name = "btn_submit">
					</td>
				</tr>
				<tr>
					<td>
						Broncos vs Patriots, Den, CO 
					</td>
					<td>
						Parking near stadium, however limited seats. Please contact me asap.  					
					</td>
					<td>
						12/14/16
					</td>
					<td>
						<input type="submit" value = "See More" id = "btn_submit" name = "btn_submit">
					</td>
				</tr>
				<tr>
					<td>
						Safe In Sound Fes Broomfield, CO 
					</td>
					<td>
						Going with one other person. Only staying for half of the event. Will not drive farther than 5 miles to pickup.   			
					</td>
					<td>
						1/27/16
					</td>
					<td>
						<input type="submit" value = "See More" id = "btn_submit" name = "btn_submit">
					</td>
				</tr>
				<tr>
					<td>
						Clay Walkers at Denver, CO  
					</td>
					<td>
						Limited seating. Requiring passengers to pay 2/3 of parking + gas. Flexible on time to leave after event (up to 90 mins after). 					
					</td>
					<td>
						12/2/16
					</td>
					<td>
						<input type="submit" value = "See More" id = "btn_submit" name = "btn_submit">
					</td>
				</tr>
			</table>	
			<?php
				if (isset($_POST['btn_submit'])){
					include 'scripts/create_account_script.php';
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


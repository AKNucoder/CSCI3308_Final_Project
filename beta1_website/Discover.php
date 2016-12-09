<?php
// Start the session - http://www.w3schools.com/php/php_sessions.asp 
session_start();
?>
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
	include 'scripts/file_names.php';
  //include 'scripts/retrieve_rides_list.php';

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
    	echo $_SESSION["user_name"];
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
<?PHP
	//echo $_SESSION["user_id"];

	//If logged in, let the user view the page, else do not let them
	if (isset($_SESSION["user_id"]) && intval($_SESSION["user_id"]) > 0){
		
	}
	else{
		?>
		<script type="text/javascript"> 
			alert("Please Sign-In or Create an Account!");
			window.location.assign("GetStarted.php");
	    </script>;  
	    <?PHP
	}
?>
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


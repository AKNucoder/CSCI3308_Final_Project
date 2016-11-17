<!DOCTYPE html>
<html>
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
      echo '<li><a href="#" class="w3-padding-large w3-white" onclick="location.href=\''.ABOUT_US.'\'">About Us</a></li>';
      echo '<li class="w3-hide-small"><a href="#" class="w3-padding-large w3-hover-white" onclick="location.href=\''.LOG_IN.'\'">Sign In</a></li>';
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
  <p class="w3-xlarge">Connecting you for your everyday commuting needs with others who commute! Carpool Connections is all about elimating the burden on your wallet, using less gas, and making the environment a better place!</p>
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


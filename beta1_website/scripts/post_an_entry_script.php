<!-- 
This script was created by Maxine Harnett, Kushal Joshi and Johnathan Kruse
This script is simply to test the user ability to create a new account.
-->
<!DOCTYPE html>
<html>
<?PHP
	include 'support/configdb.php';
	include 'support/opendb.php';
	include 'support/send_query_to_db.php';
	include 'support/attribute_names.php';
?>

<body>
	<?php
	$error = NULL;
	$title = $_POST["title"];
	$description = $_POST["description"];
	$tag = $_POST["tags"];
	$month = $_POST["month_of_event"];
	$year = $_POST["year_of_event"];
	$day = $_POST["day_of_event"];
	$hour = $_POST["hour_of_event"];
	$minute = $_POST["minute_of_event"];
	$fare_not_decimal = $_POST["fare_not_decimal"];
	$fare_decimal = $_POST["fare_decimal"];
	$user_id = $_SESSION["user_id"];
	//$user_id = 1;
	echo "At begin";
	$title_validated = False;
	$description_validated = False;
	$tag_validated = False;
	/*
	$month_validated_validated = False;
	$year_validated = False;
	$day_validated = False;
	$hour_validated = False;
	$minute_validated = False;
	*/
	$fare_validated = False;

	// Check to see if the inputs are valid and add them to the database or throw an error.
	if (!empty($title) and !empty($description) and !empty($tag) and !empty($fare_not_decimal) and !empty($fare_decimal)){	
		//echo "Validating <br>";
		$title_validated = validate_title($title);
		$description_validated = validate_description($description);
		$tag_validated = validate_tag($tagvalidated);
		echo "in here";
		//Concatinate fare into a float
		$fare = floatval($fare_not_decimal . "." . $fare_decimal);
		$fare_validated = validate_fare($fare);

		if (!$title_validated){
			$error = "Title Not Validated<br>";
		}
		if (!$description_validated){
			$error = "Description Not Validated<br>";
		}
		if (!$tag_validated){
			$error = "Tag Not Validated<br>";
		}
		if (!$fare_validated){
			$error = "Fare Cost Not Validated<br>";
		}

		echo $error;

		//Dont send the info to the database until all information has been validated.
		if ($title_validated && $description_validated && $tag_validated && $fare_validated){
			//Since two different tables are used to store the user profile and user contact details, two SQL statements were made.
			$event_date = $year."-".$month ."-".$day." ".$hour.":".$minute.":00";

			$My_SQL_create_new_user_entry = "INSERT INTO `".TABLE_USER_ENTRY."` (`".ATTRIBUTE_USER_ID."`, `".ATTRIBUTE_TITLE."`,`".ATTRIBUTE_DESCRIPTION."`,`".ATTRIBUTE_EVENT_DATE."`,`".ATTRIBUTE_TAGS."`,`".ATTRIBUTE_PRICE."`) VALUES 
												(".$user_id.",'".$title."','".$description."','".$event_date."','".$tag."',".$fare.");";
			echo $My_SQL_create_new_user_entry;
			$My_SQL_create_new_user_entry_sent = mysql_query($My_SQL_create_new_user_entry);
			if ($My_SQL_create_new_user_entry_sent){
				//Must give credit to Santak Kumar Mishra for showing how to redirect to another page using javascript
                //http://stackoverflow.com/questions/15000591/redirect-to-another-page-after-button-submit-->
				echo 'Yo worked';
				echo '<script type="text/javascript"> ';
				echo '	window.location.assign("Discover.php");';
                echo '</script>';
			}
			else{
				$error = "Error: Could not save ride listing. Contact support. <br>";
			}
		}

	}
	else {
		//$error = "Please fill out all required fields.<br>";
		echo "Please fill out all required fields.<br>";
	}

	//Check to ensure title is correct
	function validate_title($title){
		$validation = False;

		$length = strlen($title);
		if($length < 4 || $length > 35){
			$error = "Error: Title length must be between 4 and 35 characters.<br>";
		} 
		else 
			$validation = True;
		return $validation;
	}

	//Ensure user has entered a correct description
	function validate_description($description){
		$validation = False;

		$length = strlen($description);
		if($length < 10 || $length > 600){
			$error = "Error: Description length must be between 8 and 20 characters.<br>";
		} 
		else 
			$validation = True;
		return $validation;
	}

	//Check tags to ensure they are to long and do not have numbers
	function validate_tag($tag){
		$validation = True;

		if(preg_match('~[^a-zA-Z ]~', $tag)){
			$validation = False;
			echo "Error: Please enter tags without numbers.";
		}

		return $validation;
	}

	//Check if fare is a cost
	function validate_fare($fare){
		$validation = False;
		$fare_string = strval($fare);
		// check to see that it's entirely numbers
		if( preg_match('~[0-9\.]~', $fare_string)==1 && $fare>0 && $fare<1000){
			//echo "Validate phone within database. <br>";
			$validation = True;
		}
		else {
			$error = "Error: Incorrect fare format. Must be a number greater than zero. <br>";
		}

		return $validation;
	}
	include 'support/closedb.php';
	/*
	echo '<script>';
	echo '$(document).ready(function() {';
	echo 	"$('#error_message').text(".$error.")";
	echo '})';
	echo '</script>';
	echo '<br>'.$error;
	*/
	?>

	<!-- <button onclick="history.go(-1);"> Back </button> -->
</body>
</html>
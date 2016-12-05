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
	$search_term = $_POST["search"];
	print_rides(" ");
	
	if (isset($_POST['btn_search'])){
		
		if (!empty($search_term)){
		search_rides($search_term);
		}
	}

	//Display ride postings as entry on table.
	function print_rides($order){
			//Search for all rides and keep printing all the results as rows in the table
			//http://php.net/manual/en/function.mysql-fetch-array.php
			$order_type = ATTRIBUTE_EVENT_DATE;
			if (($order) == "Title"){
				$order_type = ATTRIBUTE_TITLE;
			}


			$search_query_all_rides="SELECT *
							    	FROM ". TABLE_USER_ENTRY . "
							    	ORDER BY ". $order_type." ASC;";
			$result = mysql_query($search_query_all_rides);
			//echo "Here";
			
			?>
		<div id="rides_list">
      		<?PHP
			while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
    				echo'
					 <tr height:"200">
			          <td width="120" style="padding-right: 15px;">'.
			            $row[ATTRIBUTE_TITLE]
			          .'</td>
			          <td style="padding-right: 15px;">
			          '.''//<a href="url" color="blue">'.$row[ATTRIBUTE_DESCRIPTION].'</a>.
			          .'<a>'.$row[ATTRIBUTE_DESCRIPTION].'</a></td>
			          <td width="100">'.
			            substr($row[ATTRIBUTE_EVENT_DATE],0,10)
			            .'
			          </td>
			          <td>
			            <input type="submit" value = "See More" id = "btn_submit" name = "btn_submit">
			          </td>
			          
			        </tr>
			        ';
			}
        ?>
        </div>
		<?PHP
			mysql_free_result($result);
		
	}

	//Display ride postings as entry on table.
	function search_rides($search_term){
			//Search for all rides and keep printing all the results as rows in the table
			//http://php.net/manual/en/function.mysql-fetch-array.php
			
			$search_query_all_rides="SELECT *
							    	FROM ". TABLE_USER_ENTRY . "
							    	WHERE ".ATTRIBUTE_TAGS." LIKE '%".$search_term."%'";
			$result = mysql_query($search_query_all_rides);
			//echo $search_query_all_rides;
			
			if ($result!=NULL){
				//echo "Inside";
				
				echo'
				<script type="text/javascript">
				$( document ).ready(function() {
				   $("#main_table tbody").empty();
				});
				
				</script>
				';
				//Temporary!!
				echo '
				<table id="table" width="600px" border ="2">
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
		        ';
				while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
	    				echo'
						 <tr height:"200">
				          <td width="120" style="padding-right: 15px;">'.
				            $row[ATTRIBUTE_TITLE]
				          .'</td>
				          <td style="padding-right: 15px;">
				          '.''//<a href="url" color="blue">'.$row[ATTRIBUTE_DESCRIPTION].'</a>.
				          .'<a>'.$row[ATTRIBUTE_DESCRIPTION].'</a></td>
				          <td width="100">'.
				            substr($row[ATTRIBUTE_EVENT_DATE],0,10)
				            .'
				          </td>
				          <td>
				            <input type="submit" value = "See More" id = "btn_submit" name = "btn_submit">
				          </td>
				          
				        </tr>
				        ';
				}
			mysql_free_result($result);
			}
			echo '</table>';
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
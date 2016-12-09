<?PHP	
//This is to search to see if specific terms exist in database
	function send_query_to_db($search_query){
		//Get the query results into an array
		$search_query_result=mysql_query($search_query);
		$search_query_results_parsed = False;

		//$returned_result = $search_query_results_parsed[$attribute_name];
		if ($search_query_result != False){
			$search_query_results_parsed=mysql_fetch_array($search_query_result);
		}
		return $search_query_results_parsed;
	}
?>
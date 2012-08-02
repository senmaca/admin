<?php
	require_once ('config.php');
	require_once ('mysql.php');
	$db = new MySQL(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
	$query_result = $db->query('Show Tables From '.DB_DATABASE);
	//echo(count($query_result->rows));
	
	for ($n = 0; $n < count($query_result->rows); $n++)
	{
		$row = $query_result->rows[$n];
		$field_name = 'Tables_in_'.DB_DATABASE;
		//echo ($row[$field_name].'<br/>');
		
		$new_query = 'ALTER TABLE '.$row[$field_name].' ADD yfc_user_id int(11) UNIQUE;';
		$new_query_result = $db->query($new_query);
		echo($new_query.'_#_'.$new_query_result.'<br/>');
		
	}
	
	
	
	
?>
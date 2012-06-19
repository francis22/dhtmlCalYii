<?php
	$mysql_server="localhost";
	$mysql_user = "root";
	$mysql_pass = "root";
	$mysql_db = "testproject";
	
	//configure database for pagoda
	if(isset($_SERVER['PLATFORM']))
	{
		
		$mysql_server="tunnel.pagodabox.com:3306";
		$mysql_user = "pinkie";
		$mysql_pass = "7cumd2MS";
		$mysql_db = "testproject";
	
	}
  
	//$excel_file = "../common/excel_sample.xls";
	
	//necessary for PostgreSQL related samples only 
	//$postrgre_connection = "host=localhost port=5432 dbname=sampleDB user=root password=1234";
	//necessary for Oracle related samples only 
	//$oci_connection = "some here";
	//necessart for SQL Anywhere connection
	//$sasql_conn = "uid=DBA;pwd=sql";
?>

<?php
//Edit the following fields in order to establish a connection with MySQL
//********************************************************************************
$dbhost	= "localhost"; //Leave this as 'localhost' once uploaded on a server
$dbuser	= "root"; //Username that is allowed to access the database
$dbpass	= ""; //Password
$dbname	= "gag"; //Name of the database
//********************************************************************************

$conn= mysqli_connect($dbhost,$dbuser,$dbpass, $dbname) or die ("could not connect to mysql"); 
//if($conn)
//{

//echo" connected dude";
//}
mysqli_select_db($dbname);
		$dbServer = 'localhost'; //Define database server host
		$dbUsername = 'root'; //Define database username
		$dbPassword = ''; //Define database password
		
		
?>

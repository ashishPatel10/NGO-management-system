<?php 
$dbhost="localhost";
$dbuser ="root";
$dbpass="alwayshhg";
$db="ngo 1";
$conn=new Mysqli($dbhost,$dbuser,$dbpass,$db);

if ($conn->connect_error) {
	//echo "connection failed";
}
else{
	//echo "connection succesfull";
}
 ?>

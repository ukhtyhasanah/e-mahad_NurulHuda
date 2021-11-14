<?php  

error_reporting(0);

//Database Configuration
$db_name 	= "e-ma_had";
$host		= "localhost";
$username	= "root";
$password	= "";

//make connection to database
$conn 		= mysqli_connect($host,$username,$password,$db_name) or die("Database connection error!");


?>
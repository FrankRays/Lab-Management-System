<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mini_project";

//create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

//to check connection
if(!$conn){
	die("Connection failed: " . mysqli_connect_error());
}
?>
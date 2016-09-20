<?php
session_start();

$hostname="localhost";
$username="root";
$password="1234";
$database="db_member";
$con = new mysqli($hostname, $username, $password, $database);

if($con->connect_error){
	die("Connection ERROR");
}
?>
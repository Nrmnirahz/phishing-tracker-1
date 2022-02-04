<?php 


$hostname= "127.0.0.1";
$username= "phishing";
$password= "P@ssw0rd";
$db_name= "phishing";

$conn = mysqli_connect($hostname, $username, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
} 

if (!isset($_SESSION)) {
	session_start();
}




<?php
error_reporting(E_ERROR | E_WARNING | E_NOTICE);

if ($_SERVER['SERVER_NAME'] != "localhost") {
	$_hostname = "";
	$_username = "";
	$_password = "";
	$_database = "";
	$_domain = "";
} else {
	// TODO: Replace details with token / config
	$_hostname = "localhost";
	$_username = "root";
	$_password = "root";
	$_database = "db_test";
	$_domain = "localhost:8888/Glowing-Happiness";
}
$_PDO = new PDO("mysql:host=$_hostname; dbname=$_database","$_username", "$_password");

$_PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>

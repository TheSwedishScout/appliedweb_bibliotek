<?php

function test_input($data) {

	global $conn;

	$data = trim($data);

	$data = stripslashes($data);

	$data = htmlspecialchars($data);

	$data = mysqli_real_escape_string ( $conn , $data );

	return $data;

}

function connect_to_db(){
	include("sql.php");
	$conn = mysqli_connect(HOST, USER, PASSWORD, DATABASE) or die(mysqli_error());

	if ($conn->connect_error) {

		die("Connection failed: " . $conn->connect_error);

	} 

	$sql_main = "SET NAMES 'utf8'";
	$result = $conn->query($sql_main);
	//mysqli::set_charset('utf8'); // when using mysqli

	$sql_second ="CHARSET 'utf8'";
	$result = $conn->query($sql_second);
	//sets utf-8 as CHARSET in mySQL§
	return $conn;
}
function test_input_noDB($data) {

	$data = trim($data);

	$data = stripslashes($data);

	$data = htmlspecialchars($data);

	return $data;

}
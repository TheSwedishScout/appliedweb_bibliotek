<?php
	
	include('function.php');
	session_start();
	/*Reserv book sent in a post*/
	/*
	get user id
	get book id

	input to loandbooks user id and book id

	return a true statement */
	$book = test_input($_REQUEST['book']);
	$user = test_input($_SESSION['user_id']);

	$conn = connect_to_db();
	$sql = "INSERT INTO `loand` (`user`, `book`, `out_date`) VALUES ('$user', '$book', NOW());";
	if ($conn->query($sql) === TRUE) {
	    $response = ['success' => 'true', 'book'=>$book];
	} else {
	    $response = ['success' => 'false', "Error:" => $conn->error];
	}
	$conn->close();

	echo (json_encode($response));
	

?>
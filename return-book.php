<?php
	
	include('function.php');

	/*Reserv book sent in a post*/
	/*
	get user id
	get book id

	input to loandbooks user id and book id

	return a true statement */
	$book = test_input($_REQUEST['book']);
	$user = test_input($_REQUEST['user']);

	$conn = connect_to_db();
	$sql = "DELETE FROM loandbooks WHERE user = $user and book = $book limit 1";
	//$sql = "INSERT INTO `loandbooks` (`id`, `user`, `book`) VALUES (NULL, '$user', '$book');";
	if ($conn->query($sql) === TRUE) {
	    $response = ['success' => 'true', 'book'=>$book];
	} else {
	    $response = ['success' => 'false', "Error:" => $conn->error];
	}
	$conn->close();

	echo (json_encode($response));
	

?>
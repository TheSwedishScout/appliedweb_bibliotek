<?php
	
	include('function.php');
	session_start();
	/*Reserv book sent in a post*/
	/*
	get user id
	get book id

	input to loandbooks user id and book id

	return a true statement */
	$book = test_input($_POST['book']);
	$user = test_input($_SESSION['user_id']);

	$conn = connect_to_db();
	$sql = "UPDATE `loand` SET `in-date` = NOW() WHERE loand.user = $user AND loand.book = $book;";
	//$sql = "INSERT INTO `loandbooks` (`id`, `user`, `book`) VALUES (NULL, '$user', '$book');";
	if ($conn->query($sql) === TRUE) {
	    $response = ['success' => 'true', 'book'=>$book];
	} else {
	    $response = ['success' => 'false', "Error:" => $conn->error];
	}
	$conn->close();

	echo (json_encode($response));
	

?>
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
	$sql = "UPDATE `loand` SET `in_date` = NOW() WHERE loand.user = ? AND loand.book = ?;";
	$stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $user, $book);
	//$sql = "INSERT INTO `loandbooks` (`id`, `user`, `book`) VALUES (NULL, '$user', '$book');";
	if ($stmt->execute() === TRUE) {
	    $response = ['success' => 'true', 'book'=>$book];
	} else {
	    $response = ['success' => 'false', "Error:" => $conn->error];
	}
	$conn->close();

	echo (json_encode($response));
	

?>
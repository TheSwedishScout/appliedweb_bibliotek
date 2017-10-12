<?php

function test_input($data) {

	$data = trim($data);

	$data = stripslashes($data);

	$data = htmlspecialchars($data);

	$conn = connect_to_db();

	$data = mysqli_real_escape_string ( $conn , $data );

	return $data;
	$conn->close();

}

function connect_to_db(){
	include_once("config.php");
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
function isEmail($email){

	$regex = '/^(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){255,})(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){65,}@)(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22))(?:\.(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-[a-z0-9]+)*\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-[a-z0-9]+)*)|(?:\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\]))$/iD';
	if(preg_match($regex,$email,$matches)){
		return true;
	}else{
		return false;
	}
}

function upload_image($file, $location){
	if (isset($file)) {
		$filetypes = ['jpg', 'jpeg', 'gif', 'png']; //Allowed filetypes
		$extention = explode('/', $file['type']); // seperates the string at "/" and put it into an array
	 	$extention = strtolower(end($extention)); //takes the last instans in the array and makes it to lowercase
		$error=[];
		if(!in_array($extention, $filetypes)) { // checs if the file type is in the allowed list
			$error[] = "filetype is not allowed, allowed types is: ". implode(", ", $filetypes); //makes an error message
		}
		if($file['size'] > 8000000){ // checks if the file is bigger then 8MB 
	        
	        $error[]='The file exceeded the upload limit'; // creates an error messages
	    }
		if (empty($error)) { // check if thers any error messages in the array
				//save image
			//echo basename($file['name']);
			$name = $location.basename($file['name']);
			$name = str_replace(" ", "", $name);
			$name = str_replace("å", "a", $name);
			$name = str_replace("ä", "a", $name);
			$name = str_replace("ö", "o", $name);
			move_uploaded_file($_FILES["upload"]["tmp_name"], $name);
		}else{
			var_dump($error);
		}
		$name =str_replace("../", "", $name);
		return $name;
	}
	//return FALSE;

}
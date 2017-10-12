<?php


if (isset($_FILES['upload'])) {
	$filetypes = ['jpg', 'jpeg', 'gif', 'png']; //Allowed filetypes
	$extention = explode('/', $_FILES['upload']['type']); // seperates the string at "/" and put it into an array
 	$extention = strtolower(end($extention)); //takes the last instans in the array and makes it to lowercase
	$error=[];
	if(!in_array($extention, $filetypes)) { // checs if the file type is in the allowed list
		$error[] = "filetype is not allowed, allowed types is: ". implode(", ", $filetypes); //makes an error message
	}
	if($_FILES['upload']['size'] > 8000000){ // checks if the file is bigger then 8MB 
        
        $error[]='The file exceeded the upload limit'; // creates an error messages
    }
	if (empty($error)) { // check if thers any error messages in the array
			//save image
		//echo basename($_FILES['upload']['name']);
		$name = 'images/uploaded/'.basename($_FILES['upload']['name']);
		$name = str_replace(" ", "", $name);
		$name = str_replace("å", "a", $name);
		$name = str_replace("ä", "a", $name);
		$name = str_replace("ö", "o", $name);
		move_uploaded_file($_FILES["upload"]["tmp_name"], $name);
	}else{
		var_dump($error);
	}
}



?>
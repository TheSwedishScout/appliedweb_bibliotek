<?php 
include 'function.php'; 

$response = ['sucsses' => 'FALSE'];

//echo "systemet kollar om du är inloggad.<br>";

if (!isset($_SESSION['user_id'])){
	$nick = test_input($_POST['username']);
	$password = test_input($_POST['password']);
	$ssn = test_input($_POST['ssn']);
	$name = test_input($_POST['name']);

	/*kollar så att inte något fält är tomt*/

	if (!empty($nick) || !empty($password) || !empty($ssn) || !empty($name)){ //Något fält är tomt
		
		$options = [
		'cost' => 8
		];
		$password_hashed = password_hash($password, PASSWORD_BCRYPT, $options);
		unset($password);
		//echo "Ditt lösenord är nu krypterat och glömt.";

		//insertinge values into mysqli server

		$sql = "INSERT INTO user (ssn, name, username, password)

		VALUES ('$ssn','$name','$nick', '$password_hashed')";
		if ($conn->query($sql) === TRUE) { //successfully insertded values to database
			//echo "Ditt konto är nu sparat.<br>";
			//session start
			//echo "Du kan nu lägga in deltagare i våra listor.<br>";
			//$_SESSION['user_id'] = $nick;
			//mailing new user
			//send to start peage
			//header("Location: index.php");
			//exit();
			$response = ['sucsses' => 'TRUE'];
		}
	}
}
echo (json_encode($response));
?>


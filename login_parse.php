<?php

//$password = $_POST['password'];
//$username = $_POST['username'];

include ("function.php");
session_start();


if (!isset($_SESSION['user_id'])){
    session_unset();
    
    $pre_page = test_input($_POST['page']);
    $username = test_input($_POST['username']);
    $password = test_input($_POST['password']);

    

    $sql = "SELECT password, user_lvl, ssn, name FROM `user` WHERE `username` = '$username' OR email = '$username'";
    //echo($sql);
    $conn = connect_to_db();
    $result = $conn->query($sql);
        //var_dump($result);

        if ($result->num_rows > 0) {
            // output data of each row
            $row = $result->fetch_assoc();
            
            $password_hashed = $row['password'];
            
            if (password_verify($password, $password_hashed)) {
                //echo 'Password is valid!';
                $_SESSION['user_id'] = $row['ssn'];
                $_SESSION['user_lvl'] = $row['user_lvl'];
                $_SESSION['user_name'] = $row['name'];
                //send to start peage
                //header("Location: $pre_page");
                //exit;
                echo (json_encode(['sucsess'=> true, 'user_name' => $row['name']]));
            } else {
                echo (json_encode(['sucsess'=> false, 'error' =>"username or password incorect"]));
                
                //send to start peage
                //header('Location: login.php?status=password_wrong');
                //exit;
                
                
            }
            
        } else {
                echo (json_encode(['sucsess'=> false, 'error' =>"username or password incorect"]));
            //header('Location: login.php?status=username_wrong');
               // exit;
        }
        mysqli_close($conn);
}else {
                echo (json_encode(['sucsess'=> false, 'error' =>"already signd in"]));
    //echo "du är redan inloggad";
    //send to start peage
    //header('Location: anmalan.php');
    //exit;
}

?>
<?php

//$password = $_POST['password'];
//$username = $_POST['username'];

include ("function.php");
var_dump($_POST);

if (!isset($_SESSION['user_id'])){
    
    $pre_page = test_input($_POST['page']);
    $username = test_input($_POST['username']);
    $password = test_input($_POST['password']);

    

    $sql = "SELECT password, user_lvl FROM `user` WHERE `username` = '$username'";
    $conn = connect_to_db();
    $result = $conn->query($sql);
        //var_dump($result);
        if ($result->num_rows > 0) {
            // output data of each row
            $row = $result->fetch_assoc();
            
            $password_hashed = $row['password'];
            
            if (password_verify($password, $password_hashed)) {
                //echo 'Password is valid!';
                $_SESSION['user_id'] = $username;
                $_SESSION['user_lvl'] = $row['user-lvl'];
                //send to start peage
                header("Location: $pre_page");
                exit;
            } else {
                echo 'Invalid password.';
                
                //send to start peage
                //header('Location: login.php?status=password_wrong');
                //exit;
                
                
            }
            
        } else {
            //header('Location: login.php?status=username_wrong');
               // exit;
        }
        mysqli_close($conn);
}else {
    //echo "du är redan inloggad";
    //send to start peage
    header('Location: anmalan.php');
    exit;
}

?>
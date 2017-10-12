<?php
ini_set('session.cookie_httponly', true);
session_start();
if(isset($_SESSION['userip'])){
	if ($_SESSION['userip'] !== $_SERVER['REMOTE_ADDR']){
	    #if it is not the same, we just remove all session variables
	    #this way the attacker will have no session
	    session_unset();
	    session_destroy();   
	}
}
if(!isset($_SESSION['user_lvl']) ||$_SESSION['user_lvl'] < 2 ){
	header("Location: ../assets/singout.php");
}
$print_page = $page;
if ($print_page == "index") {
	$print_page = "Home";
}
$print_page  = ucwords(str_replace("-", " ", $print_page));
$print_page  = ucwords(str_replace("_", " ", $print_page));
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $print_page?> Book club</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>

<div class="container <?php echo $page."-page" ?> page">
	<header>
		
		<figure>
			<ul class="main-menu menu-ul">
				<li class="<?php echo ($page == 'panel' ? 'active' : NULL)?>"><a  href="panel.php">Home</a></li>
				<li class="<?php echo ($page == 'add-book' ? 'active' : NULL)?>"><a  href="add-book.php">add Books</a></li>
				<li class="<?php echo ($page == 'remove_book' ? 'active' : NULL)?>"><a href="remove-book.php">remove books</a></li>
				<li class="<?php echo ($page == 'gallery' ? 'active' : NULL)?>"><a href="gallery.php">gallery</a></li>
				<li class="<?php echo ($page == 'users' ? 'active' : NULL)?>"><a href="users.php">Users(TBD)</a></li>
			</ul>
			<div class="loginAria">
				<ul>
					<?php if (isset($_SESSION['user_id'])){
						?>
						<li>Hi, <?php echo $_SESSION['user_name'];?></li> 
						<li><a href="../assets/singout.php">log out</a></li>
						<?php
					}else{?>
					<li><a href="register.php">Register</a></li>
					<li id="login"><a href="#">Sign in</a></li>
					<?php
					}
					?>
				</ul>
				<form id="loginForm" class="hidden" action="assets/login_parse.php" method="POST">
					<input type="text" name="username" placeholder="Username">
					<input type="password" name="password" placeholder="Password">
					<input type="submit" name="login" value="Loga in">

				</form>
			</div>
			
			<h1><?php 
			echo $print_page;
			?></h1>
			<img class="header-image" src="../images/titel1.jpg">
		</figure>
	</header>
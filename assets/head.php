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
$print_page = $page;
if ($print_page == "index") {
	$print_page = "Home";
}
$print_page  = ucwords(str_replace("-", " ", $print_page)); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $print_page?> Book club</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<div class="container <?php echo $page."-page" ?> page">
	<header>
		
		<figure>
			<ul class="main-menu menu-ul">
				<li class="<?php echo ($page == 'index' ? 'active' : NULL)?>"><a  href="index.php">Home</a></li>
				<li class="<?php echo ($page == 'Browse-Books' ? 'active' : NULL)?>"><a  href="Browse-Books.php">Browse Books</a></li>
				<li class="<?php echo ($page == 'My-Books' ? 'active' : NULL)?>"><a href="My-Books.php">My Books</a></li>
				<li class="<?php echo ($page == 'About-Us' ? 'active' : NULL)?>"><a href="About-Us.php">About Us</a></li>
				<li class="<?php echo ($page == 'Contact' ? 'active' : NULL)?>"><a href="Contact.php">Contact</a></li>
			</ul>
			<div class="loginAria">
				<ul>
					<?php if (isset($_SESSION['user_id'])){
						?>
						<li>Hi, <?php echo $_SESSION['user_name'];?></li> 
						<li><a href="assets/singout.php">log out</a></li>
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
			<img class="header-image" src="images/titel1.jpg">
		</figure>
	</header>
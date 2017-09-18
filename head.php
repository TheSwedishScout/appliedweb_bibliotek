<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>MT Book club</title>
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
					<li>Registtera</li>
					<li id="login">logga in</li>
				</ul>
				<form id="loginForm" class="hidden" action="login_parse.php" method="POST">
					<input type="text" name="username" placeholder="Username">
					<input type="password" name="password" placeholder="Password">
					<input type="submit" name="login" value="Loga in">
					<input type="hidden" name="page" value="<?php echo $page ?>">

				</form>
			</div>
			
			<h1><?php 
			if ($page == "index") {
				$page = "Home";
			}
			echo str_replace("-", " ", $page);
			?></h1>
			<img class="header-image" src="images/titel1.jpg">
		</figure>
	</header>
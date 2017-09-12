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
				<li><a class="<?php echo ($page == 'index' ? 'active' : NULL)?>" href="index.php">Home</a></li>
				<li><a class="<?php echo ($page == 'Browse-Books' ? 'active' : NULL)?>" href="Browse-Books.php">Browse Books</a></li>
				<li><a class="<?php echo ($page == 'My-Books' ? 'active' : NULL)?>" href="My-Books.php">My Books</a></li>
				<li><a class="<?php echo ($page == 'About-Us' ? 'active' : NULL)?>" href="About-Us.php">About Us</a></li>
				<li><a class="<?php echo ($page == 'Contact' ? 'active' : NULL)?>" href="Contact.php">Contact</a></li>
			</ul>
			
			<ul class="loginAria">
				<li>Registtera</li>
				<li>logga in</li>
			</ul>
			
			<h1><?php 
			if ($page == "index") {
				$page = "Home";
			}
			echo str_replace("-", " ", $page);
			?></h1>
			<img class="header-image" src="images/titel1.jpg">
		</figure>
	</header>
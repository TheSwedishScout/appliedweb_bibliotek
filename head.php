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
			<li><a href="index.php">Home</a></li>
			<li><a href="About-Us.php">About Us</a></li>
			<li><a href="Browse-Books.php">Browse Books</a></li>
			<li><a href="My-Books.php">My Books</a></li>
			<li><a href="Contact.php">Contact</a></li>
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
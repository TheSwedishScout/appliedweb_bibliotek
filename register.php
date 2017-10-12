<?php
$page = (pathinfo(__file__)['filename']);
	include("assets/head.php");
 ?>
	<main class="float-p">
		<div class="frontpage-card">
			<h2>Register</h2>
			<form method="POST" name="register" id="register-regP">
				<input required type="text" name="name" placeholder="Erik Nilsson">
				<input required type="number" name="ssn" placeholder="YYMMDDXXXX">
				<input required type="text" name="username" placeholder="DarkLordC3PO">
				<input required type="email" name="email" placeholder="name@example.se">
				<input required type="password" name="password" placeholder="password">				
				<input required type="submit" name="">
			</form>
		</div>
		<div class="frontpage-card">
			<h2>Sign in</h2>
			<form method="POST" name="signIn" id="login-regP">
				<input type="text" name="username" placeholder="DarkLordC3PO">
				<input type="password" name="password" placeholder="password">
				<input type="submit" name="">
			</form>
		<?php //var_dump($_SESSION); ?>
		</div>
	</main>
 <?php
    include("assets/footer.php")
 ?>
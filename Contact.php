<?php
$page = (pathinfo(__file__)['filename']);

	include("head.php");
 ?>
	<main>
		<div class="contact-card">
			<img src="images/me.jpg">
			<h2>Max Timje</h2>
			<p>max@timje.se</p>
			<p>0730641448</p>
		</div>
		<form action="sendMail.php" method="post">
			<input type="text" name="Subject" placeholder="Subject">
			<textarea placeholder="Your message" name="message"></textarea>
			<input type="email" name="email" placeholder="name@example.com">
			<input type="hidden" value="Contact.php" name="page">
			<input type="submit" name="submit" value="send">
		</form>
	</main>
<?php
	include("footer.php")
 ?>
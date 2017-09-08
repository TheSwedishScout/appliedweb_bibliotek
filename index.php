<?php
$page = (pathinfo(__file__)['filename']);
include("head.php")
 ?>
	<main class="float-p">
		<div class="frontpage-card">
			<h2>Browse Books</h2>
			<input type="search" name="find-book" class="search" placeholder="Search your book">
		</div>
		<div class="frontpage-card">
			<h2>My Books</h2>
		</div>
	</main>
<?php
	include("footer.php")
 ?>
<?php
$page = (pathinfo(__file__)['filename']);
include("head.php");
include("function.php");
 ?>
	<main class="float-p">
		<div class="frontpage-card">
			<h2>Browse Books</h2>
			<form action="Browse-books.php" method="GET">
				<input type="search" name="q" class="search" placeholder="Search your book">
			</form>
		</div>
		<div class="frontpage-card">
			<h2>My Books</h2>
			<?php $return = isEmail("max@timje.se");
			var_dump($return) ?>
		</div>
	</main>
<?php
	include("footer.php")
 ?>
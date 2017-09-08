<?php
	$page = (pathinfo(__file__)['filename']);
	include("head.php");
 ?>
	<main>
		<article class="book">
			<img class="book-cover" src="images/books/Harry01english.jpg">
			<div class="aboute">
				<h2>Title</h2>
				<p>Summary</p>
				<p>Return date: 2017-10-04</p>
			</div>
			<button class="reserve">Return</button>
		</article>
		<article class="book">
			<img class="book-cover" src="images/books/hpsorcstone.jpg">
			<div class="aboute">
				<h2>Title</h2>
				<p>Summary</p>
				<p>Return date: 2017-10-04</p>
			</div>
			<button class="reserve">Return</button>
		</article>
	</main>
<?php
	include("footer.php")
 ?>
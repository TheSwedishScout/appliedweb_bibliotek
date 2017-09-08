<?php
	include("function.php");
$page = (pathinfo(__file__)['filename']);

	include("head.php");
 ?>
	<main>
		<article class="book">
			<img class="book-cover" src="images/books/Harry01english.jpg">
			<div class="aboute">
				<h2>Title</h2>
				<p>Summary</p>
			</div>
			<button class="reserve">Reserve</button>
		</article>
		<?php
		$conn = connect_to_db();
		$sql = "SELECT * FROM books";
		$result = $conn->query($sql);
		

		if ($result->num_rows > 0) {
		    // output data of each row
		    while($row = $result->fetch_assoc()) {
		        echo "id: " . $row["id"]. " - Name: " . $row["title"]. "<br>";
		    }
		} else {
		    echo "0 results";
		}
		$conn->close();
		?>
		
		<form action="" method="POST">
			<input type="text" name="Title">
			<input type="text" name="Sumery">
			<input type="submit" name="Submit">
		</form>
	</main>
<?php
	include("footer.php")
 ?>
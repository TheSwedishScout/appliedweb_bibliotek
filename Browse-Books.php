<?php
	include("function.php");
$page = (pathinfo(__file__)['filename']);

	include("head.php");
 ?>
	<main>
		
		<?php
		$conn = connect_to_db();
		$sql = "SELECT * FROM books";
		$result = $conn->query($sql);
		

		if ($result->num_rows > 0) {
		    // output data of each row
		    while($row = $result->fetch_assoc()) {
		    	?>
				<article class="book">
					<img class="book-cover" src="<?php echo $row['image'] ?>">
					<div class="aboute">
						<h2><?php echo $row['title'] ?></h2>
						<p><?php echo $row['author'] ?></p>
						<p><?php echo $row['description'] ?></p>
					</div>
					<button class="reserve">Reserve</button>
				</article>

		    	<?php
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
<?php
	$page = (pathinfo(__file__)['filename']);
	include("head.php");
	include('function.php')
 ?>
	<main>
		<?php
			$conn = connect_to_db();
			$sql = "SELECT books.* FROM books, loandbooks WHERE loandbooks.user = 1 AND loandbooks.book = books.id"; //replace "1" whit the users id to get that users books
			$result = $conn->query($sql);
			
			if ($result->num_rows > 0) {
			    // output data of each row
			    while($row = $result->fetch_assoc()) {
			    	?>
						<article class="book" id="book-<?php echo $row['id'];?>">
							<img class="book-cover" src="<?php echo $row['image'] ?>">
							<div class="aboute">
								<h2><?php echo $row['title'] ?></h2>
								<p><?php echo $row['author'] ?></p>
								<p><?php echo $row['description'] ?></p>
							</div>
							<button class="return" value="<?php echo($row['id']) ?>">return</button>
						</article>
			    	<?php
			        //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
			    }
			} else {
			    ?>
			    <article>
			    	<h2>No books in your list. Care to reserve some books <a href="Browse-books.php">Browse</a></h2>
			    </article>
			    <?php
			}
		?>
	</main>
	<script type="text/javascript" src="js/return-book.js"></script>
<?php
	include("footer.php")
 ?>
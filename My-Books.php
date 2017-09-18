<?php
	$page = (pathinfo(__file__)['filename']);
	include("head.php");
	include('function.php')
 ?>
	<main>
		<?php
			$user = $_SESSION['user_id'];
			$conn = connect_to_db();
			$sql = "SELECT books.*, GROUP_CONCAT(author.first_name , ' ', author.last_name) as authors FROM `books`, author, authorbookconnect, loand WHERE loand.user = $user AND loand.book = books.isbn AND books.isbn = authorbookconnect.book AND authorbookconnect.author = author.id"; //replace "1" whit the users id to get that users books
			$result = $conn->query($sql);
			
			if ($result->num_rows > 0) {
			    // output data of each row
			    while($row = $result->fetch_assoc()) {
			    	?>
						<article class="book" id="book-<?php echo $row['isbn'];?>">
							<img class="book-cover" src="<?php echo $row['image'] ?>">
							<div class="aboute">
								<h2><?php echo $row['title'] ?></h2>
								
								<p><?php  echo $row['authors'] ?></p>
								<p><?php echo $row['ingress'] ?></p>
							</div>
							<button class="return" value="<?php echo($row['isbn']) ?>">return</button>
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
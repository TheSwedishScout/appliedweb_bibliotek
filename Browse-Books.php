<?php
	include("function.php");
$page = (pathinfo(__file__)['filename']);

	include("head.php");
 ?>
	<main>
		
		<?php
		$conn = connect_to_db();
		if(isset($_GET['q'])){
			$search = test_input($_GET['q']);
			
			$search = str_replace(" ", "%", $search);
			$sql = "SELECT * FROM books WHERE  `author` LIKE '%$search%' OR `title` LIKE '%$search%'";
		}else{
			$sql = "SELECT * FROM books";
		}
		$result = $conn->query($sql);

		//Get users books to remove reserv button
		$sql2= "SELECT book FROM `loandbooks` WHERE user = 1";
		$result2 = $conn->query($sql2);
		$usersBooks = [];
		if ($result2->num_rows > 0) {
		    // output data of each row
		    while($row2 = $result2->fetch_assoc()) {
		    	$usersBooks[] = $row2['book'];
		    }
		}

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
					<?php if(!in_array($row['id'], $usersBooks)){
							?>
								<button class="reserve" value="<?php echo($row['id']) ?>">Reserve</button>
							<?php
						} ?>
				</article>

		    	<?php
		    }
		} else {
			if (isset($_GET['q'])) {
				echo("No books match \" ".test_input($_GET['q']) ."\"");
			}else{
		    	echo "Sorry no books in the libary";
			}
		}
		$conn->close();
		?>
		
		<form action="" method="GET">
			<input type="text" name="q" placeholder="Search title or author">
			<input type="submit" name="Search" value="Search">
		</form>
	</main>
	<script type="text/javascript" src="js/reserv-book.js"></script>
<?php
	include("footer.php")
 ?>
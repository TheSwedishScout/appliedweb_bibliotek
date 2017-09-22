<?php
	$page = (pathinfo(__file__)['filename']);
	include("head.php");
	include('function.php')
?>
<main>
	<?php
		$book = test_input($_GET['book']);
		$conn= connect_to_db();

		$sql = "SELECT books.*, GROUP_CONCAT(author.first_name) as authors FROM `books`, author, authorbookconnect WHERE books.isbn = authorbookconnect.book AND authorbookconnect.author = author.id AND books.isbn = $book GROUP BY books.isbn";
		$result = $conn->query($sql);
		//var_dump($sql);
		//Get users books to remove reserv button
		if(isset($_SESSION['user_id'])){
			$user = $_SESSION['user_id'];
			$sql2= "SELECT loand.* FROM `loand` WHERE user = $user AND (in_date > CURRENT_DATE() OR in_date != CURRENT_DATE OR in_date IS NULL)";
			$result2 = $conn->query($sql2);
			$usersBooks = [];
			if ($result2->num_rows > 0) {
			    // output data of each row
			    while($row2 = $result2->fetch_assoc()) {
			    	$usersBooks[] = $row2['book'];
			    }
			}
		}


		if ($result->num_rows > 0) {
		    // output data of each row
		    while($row = $result->fetch_assoc()) {
		    	?>
				<article class="book">
					<img class="book-cover" src="<?php echo $row['image'] ?>">
					<div class="aboute">
						<h2><a href="book.php?book=<?php echo $row['isbn'];?>"><?php echo $row['title'] ?></a></h2>
						<p><?php echo $row['authors'] ?></p>
						<p><?php echo $row['ingress'] ?></p>
					</div>
					<?php 
					if(isset($_SESSION['user_id'])){
						if(!in_array($row['isbn'], $usersBooks)){
							?>
								<button class="reserve" value="<?php echo($row['isbn']) ?>">Reserve</button>
							<?php
						}
					} ?>
				</article>

		    	<?php
		    }
		}
	?>
</main>
<?php
	include ('footer.php');
?>
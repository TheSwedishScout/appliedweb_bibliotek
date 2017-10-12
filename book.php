<?php
	$page = (pathinfo(__file__)['filename']);
	include("assets/head.php");
	include('assets/function.php');
?>
<main>
	<?php
		$book = test_input($_GET['book']);
		$conn = connect_to_db();

		$stmt = $conn->prepare("SELECT books.*, GROUP_CONCAT(author.first_name) as authors FROM `books`, author, authorbookconnect WHERE books.isbn = authorbookconnect.book AND authorbookconnect.author = author.id AND books.isbn = ? GROUP BY books.isbn");
		$stmt->bind_param("s", $book);
		$stmt->execute();
		$result = $stmt->get_result();
		//var_dump($sql);
		//Get users books to remove reserv button
		if(isset($_SESSION['user_id'])){
			$user = $_SESSION['user_id'];
			$stmt2 = $conn->prepare("SELECT loand.* FROM `loand` WHERE user = ? AND (in_date > CURRENT_DATE() OR in_date != CURRENT_DATE OR in_date IS NULL)");
			$stmt2->bind_param("s", $user);
			$stmt2->execute();
			$result2 = $stmt2->get_result();
			//$result2 = $conn->query($sql2);
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
<script type="text/javascript" src="js/reserv-book.js"></script>
<?php
    include("assets/footer.php");
?>
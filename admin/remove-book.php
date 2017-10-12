<?php
	$page = (pathinfo(__file__)['filename']);
	require 'head.php';
	include '../assets/function.php';

	$conn= connect_to_db();
	if (isset($_POST['book'])) {
		$isbn = test_input($_POST['book']);

		$stmt = $conn->prepare("DELETE FROM books WHERE isbn = ?");
		$stmt->bind_param('s', $isbn);
		if(!($stmt->execute())){
			var_dump($stmt);
		}
		$stmt->close();
	}

	$sql = "SELECT `isbn`, `title` FROM `books`";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$result_existing_books = $stmt->get_result();
	?>
	


	<main>
		<form name="remove_book" action="" method="POST">
			<select name="book">
				<?php
				while($row = $result_existing_books->fetch_assoc()) {
					//var_dump($row);
					?>
					<option value="<?php echo $row['isbn']; ?>"> <?php echo $row['title'];?></option>
					<?php
				}
				?>
			</select>
			<input type="submit" name="Raderabok" value="Remove book">
		</form>
	</main>
	

<?php 
include 'footer.php';
?>
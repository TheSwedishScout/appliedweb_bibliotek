<?php
$page = (pathinfo(__file__)['filename']);
	require 'head.php';
include '../assets/function.php';
	if (isset($_POST["NyBook"])) {
		$book=[];
		$book['isbn'] = (int)test_input($_POST["isbn"]);
		$book['titel'] = test_input($_POST["titel"]);
		$book['ingress'] = test_input($_POST["ingress"]);
		$book['sidor'] = (int)test_input($_POST["sidor"]);
		$book['edition'] = (int)test_input($_POST["edition"]);
		$book['publicher'] = test_input($_POST["publicher"]);
		$book['publiched'] = test_input($_POST["publiched"]);
		if (isset($_POST['authors'])){
			$book['authors'] = array_map("test_input", $_POST['authors']);
		}else{
			echo "the book neads atleast one author <br>";
		}

		function bookEmptyValues($value){
			if(empty($value)){
				return false;
			}else{
				return $value;
			}
		}
		$hej = array_map('bookEmptyValues', $book);

		if(!in_array(false, $hej)){
			if (isset($_FILES["upload"]) && !empty($_FILES["upload"]) && $_FILES["upload"]['size'] > 100) {
				$book['image'] = upload_image($_FILES["upload"], "../images/books/");
			}else{
				$book['image'] = '';
			}
			$conn = connect_to_db();
			$sql = "INSERT INTO books (isbn, title, ingress, pages, edition, publiched, publicher, image) VALUES (?, ?, ?, ?, ?, ?, ?, ?);";
			$stmt = $conn->prepare($sql);
			
			$stmt->bind_param("issiisss", $book['isbn'], $book['titel'], $book['ingress'], $book['sidor'], $book['edition'], $book['publiched'], $book['publicher'], $book['image']);
			$stmt->execute();
			$stmt->close();
			foreach ($book['authors'] as $author => $id) {
				$sql = "INSERT INTO authorbookconnect (book, author) VALUES (?, ?);";
				$stmt = $conn->prepare($sql);
				$stmt->bind_param("ii", $book['isbn'], $id);
				$stmt->execute();
				$stmt->close();
			}
			$conn->close();
		}else{
			foreach ($hej as $key => $val) {
				echo($key . " is empty<br>");
			}
		}
	}
	if (isset($_POST['newAuthor'])) {
		$author=[];
		$author['fisrstname'] = test_input($_POST["fisrstname"]);
		$author['lastname'] = test_input($_POST["lastname"]);
		if(isset($_POST['ssn'])){
			$author['ssn'] = test_input($_POST["ssn"]);
		}else{
			$author['ssn'] = NULL;
		}
		if(isset($_POST['ssn'])){
			$author['ssn'] =(int)test_input($_POST["ssn"]);
		}else{
			$author['ssn'] = NULL;
		}
		if(isset($_POST['birthyear'])){
			$author['birthyear'] = (int)test_input($_POST["birthyear"]);
		}else{
			$author['birthyear'] = NULL;
		}
		if(isset($_POST['url'])){
			$author['url'] = test_input($_POST["url"]);
		}else{
			$author['url'] = NULL;
		}

		if(!empty($author['fisrstname']) || !empty($author['lastname'])){ 
			$conn = connect_to_db();
			$sql = "INSERT INTO `author` (`first_name`, `last_name`, `ssn`, `birthyear`, `author-page`) VALUES (?, ?, ?, ?, ?);";
			$stmt = $conn->prepare($sql);
			
			$stmt->bind_param("sssss", $author['fisrstname'], $author['lastname'], $author['ssn'], $author['birthyear'], $author['url']);
			$stmt->execute();
			$stmt->close();
			$conn->close();
		}else{
			echo("Something wrong whit names. <br>");
		}


	}

?>
<main>
	<form method="POST" enctype="multipart/form-data">
		<h2>New Book</h2>
		<input type="text" required placeholder="ISBN" name="isbn">
		<input type="text" required placeholder="titel" name="titel"><br>
		<textarea name="ingress" required placeholder="ingress"></textarea><br>
		<input type="number" required placeholder="sidor" name="sidor">
		<input type="text" required placeholder="edition" name="edition"><br>
		<input type="text" required placeholder="publicher" name="publicher">
		<input type="date" required name="publiched"><br>
		<input type="file" name="upload" accept="image/png, image/jpeg, image/gif" /><br>
		<ul id="authorsToBook">
		</ul>
		<select id="SelectAuthor" name="SelectAuthor">
			<?php
				$conn = connect_to_db();
				$sql = "SELECT id, first_name, last_name FROM author";
				if ($result = $conn->query($sql)) {
					while ($row = $result->fetch_assoc()) {
						echo("<option value='".$row['id']."' >". $row['first_name']." ".$row['last_name']."</option>");
				    }
				}
				$conn->close();
			?>
		</select>
		<button id="addAuthorToBook" for="SelectAuthor">Add</button>
		<br>
		<input type="submit" name="NyBook">
	</form>
	<form method="POST">
		<h2>New Author</h2>
		<input type="text" required placeholder="Erik" name="fisrstname">
		<input type="text" required placeholder="johansson" name="lastname">
		<input type="number" placeholder="YYMMDDXXXX" name="ssn">
		<input type="number" placeholder="1925" minlength="4" maxlength="4" max="<?php echo date('Y') ?>" name="birthyear">
		<input type="url" placeholder="www.example.com" name="url">
		<input type="submit" name="newAuthor">
	</form>
</main>
<script type="text/javascript" src="./js/addBook.js"></script>
<?php
	
	include 'footer.php';
?>
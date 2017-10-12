var buttons = document.getElementsByClassName("return");
for (var i = buttons.length - 1; i >= 0; i--) {
	buttons[i].addEventListener('click', reserv)
}
function reserv(e) {
	e.target.value;
	postAjax("./assets/return-book.php", {'book':e.target.value, 'user':1}, bookUppdated)
}
function bookUppdated(response) {
	var data = JSON.parse(response);
	var elem = document.getElementById("book-"+data.book);
	var parent = elem.parentNode;
	parent.removeChild(elem);
	if(parent.childElementCount == 0){
		var h2 = document.createElement("h2");
		h2.innerHTML = "No books in your list. Care to reserve some books <a href='Browse-books.php'>Browse</a>";
		parent.appendChild(h2);
	}
}

document.addEventListener("DOMContentLoaded", function () {

	document.getElementById('addAuthorToBook').addEventListener('click', function (e) {
		e.preventDefault();
		var div = document.getElementById('authorsToBook');
		var author = document.getElementById('SelectAuthor');
		var newText = document.createElement("li");
		author.selectedIndex
		newText.innerText = author[author.selectedIndex].innerText;
		div.appendChild(newText);
		hiddenValue = author[author.selectedIndex].value;
		newHidden = document.createElement("input");
		newHidden.type = "hidden";
		newHidden.value = author[author.selectedIndex].value;
		newHidden.name = "authors[]";
		div.appendChild(newHidden);
		author.removeChild(author[author.selectedIndex]);
	})
	//Culd check if any author is added
})
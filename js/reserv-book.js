var buttons = document.getElementsByClassName("reserve");
for (var i = buttons.length - 1; i >= 0; i--) {
	buttons[i].addEventListener('click', reserv)
}
function reserv(e) {
	e.target.value;
	debugger;
	postAjax("./reserv-book.php", {'book':e.target.value}, bookUppdated)

}
function bookUppdated(response) {
	var data = JSON.parse(response);
	for (var i = buttons.length - 1; i >= 0; i--) {
		if(buttons[i].value == data.book){
			button = buttons[i];
			button.parentNode.removeChild(button);
		}
	}
}

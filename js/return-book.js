var buttons = document.getElementsByClassName("return");
for (var i = buttons.length - 1; i >= 0; i--) {
	buttons[i].addEventListener('click', reserv)
}
function reserv(e) {
	e.target.value;
	postAjax("./return-book.php", {'book':e.target.value, 'user':1}, bookUppdated)
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
function postAjax(url, data, success) {
    var params = typeof data == 'string' ? data : Object.keys(data).map(
            function(k){ return encodeURIComponent(k) + '=' + encodeURIComponent(data[k]) }
        ).join('&');

    var xhr = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP");
    xhr.open('POST', url);
    xhr.onreadystatechange = function() {
        if (xhr.readyState>3 && xhr.status==200) { success(xhr.responseText); }
    };
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send(params);
    return xhr;
}
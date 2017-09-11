var buttons = document.getElementsByClassName("reserve");
for (var i = buttons.length - 1; i >= 0; i--) {
	buttons[i].addEventListener('click', reserv)
}
function reserv(e) {
	e.target.value;
	postAjax("./reserv-book.php", {'book':e.target.value, 'user':1}, bookReserved)
}
function bookReserved(response) {
	debugger;
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
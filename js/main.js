 document.addEventListener("DOMContentLoaded", function(event) {
    var loginBTN = document.getElementById('login').addEventListener('click', loginView)
    function loginView(e){
    	var ost = document.getElementById('loginForm').classList.toggle('hidden');
    	//e.target.removeEventListener('click', loginView);
    }



  });
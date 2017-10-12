 document.addEventListener("DOMContentLoaded", function(event) {
    document.getElementById('login').addEventListener('click', 
    function(e){
    	var ost = document.getElementById('loginForm').classList.toggle('hidden');
    	//e.target.removeEventListener('click', loginView);
    })

    document.getElementById('loginForm').addEventListener('submit', function(e){
        e.preventDefault()
        let user = this.children['username'];
        let pass = this.children['password'];
        postAjax('assets/login_parse.php', {"username":user.value, "password":pass.value, 'page': "register"}, function(data){
            var login = document.getElementsByClassName('loginAria')[0].children
            var data = JSON.parse(data);
            if (data.sucsess){
                user.value = "";
                pass.value = "";
                login[0].innerHTML= '<li>Hi, '+data.user_name+'</li><li><a href="singout.php">log out</a></li>';
                login[1].classList.add('hidden');
            }else{
                var errorMSG = document.createElement('p');
                errorMSG.innerText = data.error;
                login[1].appendChild(errorMSG)
            }
        })
    });
    document.getElementById('login-regP').addEventListener('submit', function(e){
        e.preventDefault()
        let user = this.children['username'];
        let pass = this.children['password'];
        postAjax('assets/login_parse.php', {"username":user.value, "password":pass.value, 'page': "register"}, function(data){
            var data = JSON.parse(data);
            if (data.sucsess){
                user.value = "";
                pass.value = "";
                var login = document.getElementsByClassName('loginAria')[0].children
                login[0].innerHTML= '<li>Hi, '+data.user_name+'</li><li><a href="singout.php">log out</a></li>';
                login[1].classList.add('hidden');
                debugger;
                window.location.replace("gallery.php");
            }
        })
    });
    document.getElementById('register-regP').addEventListener('submit', function(e){
        var hej = this;
    	e.preventDefault();
        let user = this.children['username'];
        let pass = this.children['password'];
        let ssn = this.children['ssn'];
        let name = this.children['name'];
        let email = this.children['email'];
    	postAjax('assets/register_parse.php', {"username":user.value, "password":pass.value, "ssn":ssn.value, "name":name.value, "email":email.value}, function (data) {
            //MSG Acount Created
            user.value = ""
            pass.value = ""
            ssn.value = ""
            name.value = ""
            email.value = ""
            debugger;
        })
    })

  });

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
<?php 
session_start();

if (isset($_SESSION['user_lvl']) && $_SESSION['user_lvl'] >= 2){
	header("Location: panel.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin Login</title>
	<style type="text/css">
		body{
			background: #777;
		}
		#loginaria {
		  position:absolute;
		  top:50%;
		  left:50%;
		  transform: translateX(-50%) translateY(-50%);
		  background: #FFF;
		  padding: 20px; 
		}
		#loginaria input{
			display: block;
			padding: 6px;
			font-size: 26px;
			margin: 10px 0;
			
			border: 1px solid black;
			border-radius: 10px;
		}
	</style>
	<script type="text/javascript">
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
		document.addEventListener("DOMContentLoaded", function () {
			document.getElementById('loginaria').addEventListener("submit", function (e) {
				e.preventDefault();
				let user = this.children['username'];
		        let pass = this.children['password'];
		        postAjax('../assets/login_parse.php', {"username":user.value, "password":pass.value, 'page': "register"}, function(data){
		        		var result = JSON.parse(data);
			        	if (result.sucsess) {
			        		if(result.user_lvl > 2){
			        			window.location.replace("panel.php");
			        		}else{
			        		document.getElementById("errors").innerHTML = "You are not an admin. We loged you in but you are not able to get to the admin pages. <a href='../index.php'> to main part of this app</a>";
			        		}
			        	}else{
			        		user.value = "";
			        		pass.value = "";
			        		document.getElementById("errors").innerHTML = result.error + "<a href='../index.php'> go back to parts you are promited.</a>";
			        	}

					})
			})
		})

	</script>
</head>
<body>

	<form id="loginaria" method="POST">
		<h1>Admin Login</h1>
		<input type="text" placeholder="username" name="username">
		<input type="password" placeholder="password" name="password">
		<div id="errors"></div>
		<input type="submit" name="">
		<?php
			if(isset($_SESSION["user_id"])){
				?>
				Hej <?php echo($_SESSION['user_name']);?><br>
				Var god logga ut och sedan logga in med ett admin konto för att fortsätta.
				<a href="../assets/singout.php">Logga ut</a>
				<?php
			}
		?>
	</form>
	
</body>
</html>
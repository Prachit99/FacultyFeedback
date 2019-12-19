<?php
session_start();	

?>
<!DOCTYPE html>
<html>
<head>
	<title>FacultyFeedbackSystem</title>
	<link rel="stylesheet" type="text/css" href="styles/index_style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<meta charset = "utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">


	<!-- For localhost or xip-->
	<!--<meta name="google-signin-client_id" content="716216124877-da5mdpsr4slhan6h122h1l1ktjbmbqko.apps.googleusercontent.com">-->

	<!-- For LMS-->
	<meta name="google-signin-client_id" content="976607952832-72obg31hpdohd31tnusnv2e3t3jqm832.apps.googleusercontent.com">

	<script src="https://apis.google.com/js/platform.js" async defer></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>


	<script type="text/javascript">
		
		var name="";
		var url="";
		var clicked=false;//Global Variable
		function ClickLogin()
		{
			clicked=true;
		}
		
		function openForm() {
			document.getElementById("wrapper").style.display = "block";
		} 
		function closeForm() {
			

			
			document.getElementById("wrapper").style.display = "none";
		} 
		function onSignIn(googleUser) {
			
			var profile = googleUser.getBasicProfile();
			name = profile.getName();
			pic=profile.getImageUrl();
			var email=profile.getEmail();
			
			

			var auth2 = gapi.auth2.getAuthInstance();
			auth2.disconnect();
			if(clicked){

				if(email.includes("somaiya.edu"))
				{
					var theForm, newInput1, newInput2;
					theForm = document.createElement('form');
					theForm.action = 'db/login.php';
					theForm.method = 'post';
					newInput1 = document.createElement('input');
					newInput1.type = 'hidden';
					newInput1.name = 'user';
					newInput1.value = name;
					newInput2 = document.createElement('input');
					newInput2.type = 'hidden';
					newInput2.name = 'pic';
					newInput2.value = pic;
					
					newInput3 = document.createElement('input');
					newInput3.type = 'hidden';
					newInput3.name = 'email';
					newInput3.value = email;
					theForm.appendChild(newInput1);
					theForm.appendChild(newInput2);
					theForm.appendChild(newInput3);
					
					document.getElementById('hidden_form_container').appendChild(theForm);
					theForm.submit();
				}else{
					
					alert("Please login using Somaiya Mail ID");
				}

			}
		}


		function signOut() {
			var auth2 = gapi.auth2.getAuthInstance();
			auth2.signOut().then(function () {
				alert('User signed out.');
			});
		}

	</script>

</head>
<body>
	<header>
		<nav id="header">
			<div class="container">
				<div>
					<a href="#" class="pull-left visible-md visible-lg">
						<img id="logo" src="images/logo.png">
					</a>
					<div id="heading-name">
						<h1>K. J. Somaiya College of Engineering</h1>
					</div>
				</div>
			</div>
		</nav>
	</header>
	<p id ="myTag">FACULTY FEEDBACK SYSTEM</p>


	<div class="container">
		<div class="icon-bar">		
			<a id="home" href="#"><i class="fa fa-home"></i></a>	
			<a href="#"><i class="fa fa-calendar"></i></a>
			<a href="#"><i class="fa fa-users"></i></a>	
			<a href="#"><i class="fa fa-instagram"></i></a>
			<a href="#"><i class="fa fa-facebook-f"></i></a>

			
		</div>

	</div>



	<div id="container2">
		<button id = "getStarted" onclick="openForm()">Get Started</button>
	</div>
	<footer class="footer">
		<div class="container">
			<div id="contact">
				Contact Us 
			</div>
			<div class="row">
				<section id="contact-us1" class="col-sm-6">
					K. J. Somaiya College of Engineering<br>
					Vidyanagar, Vidyavihar(E), Mumbai - 400 077, Maharashtra.<br>
					Phone : 91-22-66449191
				</section>
				<section id="contact-us2" class="col-sm-6">
					Website : <a href="http://www.somaiya.edu/kjsce/">www.somaiya.edu/kjsce/</a><br>
					Email : <a href="mailto:enquiry@engg.somaiya.edu">enquiry@engg.somaiya.edu</a>
				</section>
			</div>
			<div id="copyright">&copy; 2019 somaiya vidyavihar</div>
		</div>
	</footer>

	<div id="wrapper">
		<div class="loginbox" id="myform" >
			<div id="close">
				<span style='font-size:2vw;'>&#10005;</span></div>
				<script type="text/javascript">
					var closeBtn= document.getElementById('close');
					closeBtn.addEventListener('click',closeForm);
				</script>
				<img src="images/avatar.png" class="avatar">
				<p id="login_type">L O G I N<br><br></p>
				<form method="post" action="db/login.php"class="popup">
					
					<h2 id="type">Login using credentials</h2>		
					<p>Username</p>
					<input type="text"id="e" name="email" placeholder="Enter Somaiya Email">
					<P>Password</P>
					<input type="password" id="p" name="password" placeholder="Enter Password">
					<button class="btn" type="submit" id="submit_btn" name="login_user" onclick="closeForm()">Login</button>
					<p ><h2 id="or_type">OR</h2></p>
					<div class="g-signin2" onclick="ClickLogin()" data-onsuccess="onSignIn" align="middle"></div>			
					
				</form>
			</div>
		</div>
		<div id="hidden_form_container" style="display:none;"></div>
	</body>
	</html>

	<?php

	if(isset($_SESSION["errorMessage"]))
	{
		if($_SESSION["errorMessage"]==1){
			echo '<script language="javascript">';
			echo 'alert("Login Failed. Input valid Credentials")';
			echo '</script>';
			$_SESSION["errorMessage"]=0;
		}
		
	}?>
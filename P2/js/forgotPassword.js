/*--------------forgotPassword.js---------------------*/

var forgotPasswordInfo= {
	
		un: ""
	
};

function updateForgotPasswordInfo(){
	
	var elMsg = "";
	var username = document.getElementById('username');
	
	if(username.value == "") {
		elMsg += "Please type in a Username. \n";
		username.style.borderColor = "black";
	}else{
		username.style.borderColor = "";
		username.style.borderColor = "#63D134";
		elMsg += " An email has been sent to reset your password, you are now being redirected to Login.";
		forgotPasswordInfo.un = username.value;
		console.dir(forgotPasswordInfo);
		window.open("../php/login.php");
	}
	
	
	if(elMsg != "") {
		alert(elMsg);
		return false;
	}
};
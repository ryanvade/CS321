/*--------------resetPassword.js---------------------*/

var resetPasswordInfo= {
	
		np: "",
		cp: ""
	
};

function updateResetPasswordInfo(){
	
	var elMsg = "";
	var newPassword = document.getElementById('newPassword');
	var confirmPassword = document.getElementById('confirmPassword');
	
	
	
	if(newPassword.value == "") {
		elMsg += "Please type in a new password. \n";
		newPassword.style.borderColor = "black";
	}else{
		newPassword.style.borderColor = "";
		newPassword.style.borderColor = "#63D134";
		resetPasswordInfo.np = newPassword.value;
	}
	
	if(confirmPassword.value == "") {
		elMsg += "Please confirm password. \n";
		confirmPassword.style.borderColor = "black";
	}else{
		confirmPassword.style.borderColor = "";
		confirmPassword.style.borderColor = "#63D134";
		resetPasswordInfo.cp = confirmPassword.value;
		console.dir(resetPasswordInfo);
	}
	
	
	if(elMsg != "") {
		alert(elMsg);
		return false;
		
	}
	
	if (newPassword.value == confirmPassword.value){
		window.open("login.html");
	}
};
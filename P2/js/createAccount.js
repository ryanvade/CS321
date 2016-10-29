/*--------------createAccount.js---------------------*/

var accountInfo= {
	name: "",
	email: "",
	pass: "",
	confirm: ""
};

function updateAccountInfo(){
	var elUNAnswer = document.getElementById('unanswer');
	var elEMAnswer = document.getElementById('emanswer');
	var elPWAnswer = document.getElementById('pwanswer');
	var elCPWAnswer = document.getElementById('cpwanswer');
	var elMsg = "";
	var username = document.getElementById('username');
	var email = document.getElementById('email');
	var password = document.getElementById('password');
	var confirmPassword = document.getElementById('confirmPassword');
		
	
	if(username.value.length < 8) {
		elUNAnswer.textContent = "Username must have alteast 8 characters.";
		//elMsg += "Username must have atleast 8 characters. \n";
		username.style.borderColor = "black";
		return false;
	}else{
		elUNAnswer.textContent = " ";
		username.style.borderColor = "";
		username.style.borderColor = "#63D134";
		accountInfo.name = username.value;
	}
	
	if(email.value == "") {
		elEMAnswer.textContent =  "Please type in a valid email address.";
		email.style.borderColor = "black";	
		return false;
	}else{
		elEMAnswer.textContent =  " ";
		email.style.borderColor = "";
		email.style.borderColor = "#63D134";
		accountInfo.email = email.value;
	}
	
	if(password.value == "") {
		elPWAnswer.textContent =  "Please type in a Password.";
		password.style.borderColor = "black";	
		return false;
	}else{
		elPWAnswer.textContent =  " ";
		password.style.borderColor = "";
		password.style.borderColor = "#63D134";
		accountInfo.pass = password.value;
	}
	
	if(confirmPassword.value == "") {
		elCPWAnswer.textContent =  "Please confirm password.";
		confirmPassword.style.borderColor = "black";
		return false;
	}else{
		elCPWAnswer.textContent =  " ";
		confirmPassword.style.borderColor = "";
		confirmPassword.style.borderColor = "#63D134";
		accountInfo.confirm = confirmPassword.value;
	}
	
	if(password.value != confirmPassword.value) {
		elPWAnswer.textContent =  "Passwords do not match.";
		elCPWAnswer.textContent =  "Passwords do not match.";
		//elMsg += "Passwords do not match. \n";
		return false;
	
	}else{
		elPWAnswer.textContent =  " ";
		elCPWAnswer.textContent =  " ";
		password.style.borderColor = "";
		password.style.borderColor = "#63D134";
		confirmPassword.style.borderColor = "";
		confirmPassword.style.borderColor = "#63D134";
		
		console.dir(accountInfo);
		window.open("../php/login.php");
	
	}
	if(elMsg != "") {
		alert(elMsg);
		return false;
	}
	
}

function validateName() {
	
	var name = document.getElementById("username").value;
	
	//If empty
	if (name.length == 0){
		
		produceMessage("Username is Required.", "commentName", "red");
		return false;
		
	}
	
	if(!name.match(/^(?=.*[0-9])(?=.*[a-zA-Z])([a-zA-Z0-9]+)$/)){
		produceMessage("Username must include atleast 1 number. ", "commentName", "red");
		return false;
	}
	
	produceMessage("Username is Valid ", "commentName", "green");
}


function validatePassword() {
	
	var pass = document.getElementById("password").value;
	
	//If empty
	if (pass.length == 0){
		
		produceMessage("Password is Required.", "commentPassword", "red");
		return false;
		
	}
	
	if(!pass.match(/^(?=.*[0-9])(?=.*[a-zA-Z])([a-zA-Z0-9]+)$/)){
		produceMessage("Password must include 1 number.", "commentPassword", "red");
		return false;
	}
	
	produceMessage("Password is Valid.", "commentPassword", "green");
}

function validateConfirmPassword() {
	
	var confirmPass = document.getElementById("confirmPassword").value; 
	var pass = document.getElementById("password").value;
	
	//If empty
	if (pass.length == 0){
		
		produceMessage("Password is Required.", "commentConfirmPassword", "red");
		return false;
		
	}
	
	if (pass != confirmPass){
		
		produceMessage("Password do not match.", "commentPassword", "red");
		produceMessage("Password do not match.", "commentConfirmPassword", "red");
		return false;
		
	}
	
	
	if(!pass.match(/^(?=.*[0-9])(?=.*[a-zA-Z])([a-zA-Z0-9]+)$/)){
		produceMessage("Password must include 1 number.", "commentConfirmPassword", "red");
		return false;
	}
	
	produceMessage("Confirm password is Valid.", "commentConfirmPassword", "green");
	produceMessage("Password is Valid.", "commentPassword", "green");
}








function produceMessage (msg, prompt, color){
	
	document.getElementById(prompt).innerHTML = msg;
	document.getElementById(prompt).style.color = color;
	
	
	
}


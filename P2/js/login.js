/*--------------login.js---------------------*/

var x = 0;

var loginInfo = {
	
un: "",
pw: ""

	
};


function updateLoginInfo(){
	
	//var trys = 3;
	var elUNAnswer = document.getElementById('unanswer');
	var elPWAnswer = document.getElementById('pwanswer');
	var elMsg = "";
	var username = document.getElementById('username');
	var password = document.getElementById('password');
	var valid = document.getElementById('valid');
	
	
	//var valid = false;
	
	if(username.value == "") {
		//valid.innerHTML = "Test";
		elUNAnswer.textContent = "Please type in a username";
		username.style.borderColor = "black";
		return false;
	}else{
		elUNAnswer.textContent = " ";
		username.style.borderColor = " ";
		username.style.borderColor = "#63D134";
		loginInfo.un = username.value;
		
		
	}
	
	if(password.value == "") {
		elPWAnswer.textContent = "Please type in a password.";
		password.style.borderColor = "black";	
		return false;
		
	}else{
		password.style.borderColor = "";
		password.style.borderColor = "#63D134";
		loginInfo.pw = password.value;
		
		
	}
	
	if (username.value != "" && password.value != ""){
		
		sessionStorage.setItem("name", loginInfo.un);//(KEY, VALUE)
		sessionStorage.setItem("login", "user");
		console.dir(loginInfo);

		//alert(loginInfo.un + "Session " + sessionStorage.getItem("name"));
		window.open("../php/viewPhotos.php");
		
	}

	
	if(elMsg != "") {
		alert(elMsg);
		return false;

		//return false;
	}
	

};

function welcome() {
	var username = document.getElementById('username');
	
	document.getElementById('welcome').innerHTML = username.value;
}


function validateName() {
	
	var name = document.getElementById("username").value;
	var welcome = document.getElementById("welcome").value;
	
	//If empty
	if (name.length == 0){
		
		produceMessage("Username is Required.", "commentName", "red");
		return false;
		
	}
	
	if(!name.match(/^(?=.*[0-9])(?=.*[a-zA-Z])([a-zA-Z0-9]+)$/)){
		produceMessage("Username must include atleast 1 number. ", "commentName", "red");
		produceMessage("Welcome Guest", "welcome", "black");
		return false;
	}
	
	
	produceMessage("Welcome " + name, "welcome", "black");
	produceMessage("Welcome " + name, "commentName", "green");
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





function produceMessage (msg, prompt, color){
	
	document.getElementById(prompt).innerHTML = msg;
	document.getElementById(prompt).style.color = color;
	
	
	
}


function guestLogin() {
	
	sessionStorage.setItem("login", "guest"); // Key,item
	window.open("../php/viewPhotos.php");
	
	
}




























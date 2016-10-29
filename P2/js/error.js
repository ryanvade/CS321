/*--------------error.js---------------------*/

var errorInfo= {
	
		
	
};

function updateErrorInfo(){
	
	var elMsg = "";
	var error = document.getElementById('error1');
	
	if (error.checked){
		window.open("viewPhotos.html");
	}else{
		elMsg += "Please check to verify that you understand the error(s).";
	}
	
	if(elMsg != "") {
		alert(elMsg);
		return false;
	}
};
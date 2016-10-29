/*------------------viewPhotos.js-------------------------*/

window.onload = function() {

	
	var headers = document.getElementsByTagName("th");

	for (var i = 0; i < headers.length; i++) {
		var elem = headers[i];
		elem.addEventListener('click', function() {
			headerClicked(this);

		}, false);
	}

	createTable();
	populate();
	

};

$(document).ready(function(){

var user = sessionStorage.getItem("name");
var name = sessionStorage.getItem("login");
var welcome = $('#welcome');

if (name == "guest"){
	
	welcome.text('Welcome Guest');
	$('#uploadSection').css('display', 'none');//Hide

}else{
	welcome.text('Welcome ' + user);
	$('#uploadSection').css('display', 'block');//Hide
}
	
$(document).on('click', "img.pic",function(){
	
	
	var srcImg = $(this).attr('src');
	$('#bigImage').attr('src', srcImg);
	
	
	
});


});

	



function headerClicked(el) {

	var headers = document.getElementsByTagName("th");

	for (var x = 0; x < headers.length; x++) {
		if (el == headers[x]) {
			sortIt(x);
		}
	}

};
var viewPhotoInfo = {

	fn : "",
	album : "",
	date : "",
	loc : "",
	occ : ""

};

var viewPhotoTable = new Array();

function populate() {

	var oldBody = document.getElementById('tableBody');
	var parent = oldBody.parentNode;
	var newBody = document.createElement('tbody');

	var tableData = [];
	// Nested for loop to to populate the array
	for (var a = 0; a < viewPhotoTable.length; a++) {
		// adds viewPhotoTable[a] a new row.
		var newRow = newBody.insertRow(a);

		for (var b = 0; b < viewPhotoTable[a].length; b++) {
			// adds all elements to the specific cells within the rows
			var newCell = newRow.insertCell(b);
			// initializes the sizes..
			var data;

			if (b == 0) {
				// Make image not string
				data = document.createElement("div");
				data.innerHTML = viewPhotoTable[a][b];

			} else if (b == 1) {
				// Make image not string
				data = document.createElement("div");
				data.innerHTML = viewPhotoTable[a][b];

			} else {
				data = document.createTextNode(viewPhotoTable[a][b]);
			}

			// Populates
			newCell.appendChild(data);
		}

	}
	// console.dir(parent);
	parent.replaceChild(newBody, oldBody);

	newBody.setAttribute("id", "tableBody");
};

function sortIt(header) {

	for (var j = 1; j <= viewPhotoTable.length - 1; j++) { // For each Row
		for (var i = viewPhotoTable.length - 1; i >= j; i--) {// Compares two
			// rows

			var string = viewPhotoTable[i][header].toString();
			var stringTwo = viewPhotoTable[i - 1][header].toString();

			if ((string.localeCompare(stringTwo)) === -1) {

				var temp = viewPhotoTable[i - 1];
				viewPhotoTable[i - 1] = viewPhotoTable[i];
				viewPhotoTable[i] = temp;
			}
		}
	}

	populate();
};

function createTable() {

	viewPhotoTable[0] = [ '<img src="../images/delete.png" />',
			'<img class = "pic" src="../images/image.png" />', 'hw.jpg3', 'School',
			'2016/01/25', 'Work3', 'mp03' ];

	viewPhotoTable[1] = [ '<img src="../images/delete.png" />',
			'<img class = "pic" src="../images/image.png" />', 'hw.jpg2', 'Vacation',
			'2015/02/21', 'Work2', 'mp02' ];

	viewPhotoTable[2] = [ '<img src="../images/delete.png" />',
			'<img class = "pic" src="../images/image.png" />', 'hw.jpg5', 'School2',
			'2016/11/25', 'Work1', 'mp01' ];

	viewPhotoTable[3] = [ '<img src="../images/delete.png" />',
			'<img class = "pic" src="../images/image.png" />', 'hw.jpg1', 'Apples',
			'2016/07/15', 'Work4', 'mp05' ];

	viewPhotoTable[4] = [ '<img src="../images/delete.png" />',
			'<img class = "pic" src="../images/image.png" />', 'hw.jpg0', 'Bake',
			'2016/04/07', 'Work5', 'mp04' ];
}

//This is the JSON PORTION, IT WILL POPULATE CREATE TABLE ^^^^^
//This is the JSON PORTION, IT WILL POPULATE CREATE TABLE ^^^^^
//This is the JSON PORTION, IT WILL POPULATE CREATE TABLE ^^^^^
//This is the JSON PORTION, IT WILL POPULATE CREATE TABLE ^^^^^
//This is the JSON PORTION, IT WILL POPULATE CREATE TABLE ^^^^^

/*function loadJson() {
	
	$.getJSON('../data/photoData')
	
	.done(function(data) {
		
		viewPhotoTable = data.photos;
		
		for (var i = 0; i <5; i++){
			for (var j = 0; j < 7; j++){
				.info(viewPhotoTable.data[i][j]);
			}
		}
		
	})
	
		//If the JSON file fails then alert
	//alert("Error, JSON didn't open.");
	
	
};*/


///////////////////////////////////////////////////////////////////////

var photoTable = {

	del : "",
	image : "",
	fn : "",
	album : "",
	date : "",
	loc : "",
	occ : ""

};

function updatePhotoTable() {

	// Add Row
	// Delete Row

};

function deleteThisRow(element) {

	var row = element.parentNode.parentNode.rowIndex;

	document.getElementById("table").deleteRow(row);

};

function addRow() {

	var table = document.getElementById('table');
	// var x = 0;

	var row = table.insertRow(1);
	var delButton = document.createElement("button");
	var filename = document.getElementById('filename').value;
	var albumName = document.getElementById('album').value;
	var dateTaken = document.getElementById('date').value;
	var location = document.getElementById('location').value;
	var occasion = document.getElementById('occasion').value;

	photoTable.del = row.insertCell(0); // Turn to html elt
	photoTable.image = row.insertCell(1);
	photoTable.fn = row.insertCell(2);
	photoTable.album = row.insertCell(3);
	photoTable.date = row.insertCell(4);
	photoTable.loc = row.insertCell(5);
	photoTable.occ = row.insertCell(6);

	photoTable.del.appendChild(delButton);
	//delButton.innerHTML = "delete";
	delButton.innerHTML = '<img src =\'../images/delete.png\'>';
	delButton.onclick = function() {
		deleteThisRow(this)
	};
	photoTable.image.innerHTML = 'Image';
	photoTable.fn.innerHTML = filename;
	photoTable.album.innerHTML = albumName;
	photoTable.date.innerHTML = dateTaken;
	photoTable.loc.innerHTML = location;
	photoTable.occ.innerHTML = occasion;
}



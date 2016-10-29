/*--------------site.js---------------------*/

var copyright= {
		copy: "\u00A9 ",
		year: new Date().getFullYear(),
		name: "&#169 2016 Hallmark Cards, LLC."
};

var pageInfo= {
		/* Already have my nav bar and don't have anything I want to add to this yet */
		
};

function updateCopyright(){
	var elFooter = document.getElementById('footerP');
	elFooter.textContent = copyright.copy + copyright.year + copyright.name;	
	
};


function updatePageInfo(){
	/* Function to update the DOM once I decide what I need to add other than my nav bar*/
};


window.onload = function (){
updateCopyright();
updatePageInfo();
};

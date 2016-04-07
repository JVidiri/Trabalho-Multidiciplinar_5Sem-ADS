/*
	Ajax function to load a new content into a div
*/
function clientSideRequest(id, url){
	var xhttp = new XMLHttpRequest();
  	xhttp.onreadystatechange = function() {
	    if (xhttp.readyState == 4 && xhttp.status == 200) {
	    	document.getElementById(id).innerHTML = xhttp.responseText;
	    }
  	};
  	xhttp.open("GET", url, true);
  	xhttp.send();
}
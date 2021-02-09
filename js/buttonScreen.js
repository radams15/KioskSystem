function request(url){
	var xhttp = new XMLHttpRequest();
	xhttp.open("GET", url, true);
	xhttp.send(); 
}


function readyButtonPress(number){
	var ready = document.getElementById("readyBox").checked;
	document.getElementById("readyLabel").innerHTML = ready? "Ready" : "Not Ready";
	
	console.log(number + " ready? " + ready);
	
	request("/ready.php?num="+number+"&state="+ready);
}

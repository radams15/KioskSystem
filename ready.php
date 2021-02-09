<?php

require("settings.php");

function console_log($message) {
	$STDERR = fopen("php://stderr", "w");
	fwrite($STDERR, "\n".$message."\n\n");
	fclose($STDERR);
}

function createFile($name){
	$myfile = fopen($name, "w") or die("Unable to open file!");
	fclose($myfile);
}

function enable($num){
	global $toggleDir;
	$name = "$toggleDir/$num";
		
	if(file_exists($name)){
		return;
	}
	
	createFile($name);
	
}

function disable($num){
	global $toggleDir;
	$name = "$toggleDir/$num";
	
	if(file_exists($name)){
		unlink($name);
	}
}



$kioskNum = $_GET["num"];
$state = $_GET["state"];


if(!$kioskNum || !$state){
	header('Location: /');
}

if($state == "true"){
	enable($kioskNum);
}else{
	disable($kioskNum);
}

?>

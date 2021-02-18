<?php
	require("settings.php");
	
	$num_kiosks = $_GET["num_kiosks"];
	
	if($num_kiosks){
		$num_kiosks = intval($num_kiosks);
		
		$num_kiosks_file = fopen($numKiosksFile, "w") ;
		
		fwrite($num_kiosks_file, $num_kiosks);
		
		fclose($num_kiosks_file);
		
	
		echo "Set!";
	}else{
		echo "Error!";
	}
	
	header('Location: /');
?>

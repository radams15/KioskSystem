<html>
	<head>
		<script src="/js/buttonScreen.js"></script>
		<link rel="stylesheet" href="css/style.css">
		
		<?php
			require("settings.php");
		
			$kioskNum = $_GET["num"];
			
			if(! $kioskNum){
				header('Location: /');
			}
		?>
		
	</head>
	
	
	<body>
		
		<h1>You Are Kiosk Number <?= $kioskNum?> </h1>
		
		<p id="readyLabel" >Not Ready</p> 
		<input type="checkbox" id="readyBox" onclick="readyButtonPress(<?= $kioskNum?>)">
		
	</body>
</html>

<html>
	<head>
		
		<?php
			require("settings.php");
		?>
		
		
		<script src="/js/index.js"></script>
		
		<link rel="stylesheet" href="css/style.css">
		
	</head>
	
	
	<body>
		
		<div class="kioskButtonBox">		
			<?php
				for($i=1 ; $i<=$numKiosks ; $i++){
					echo "<button class='kioskButton' onclick='selectKiosk($i)'>Kiosk $i</button>";
				}
			?>
		</div>
		
	</body>
</html>

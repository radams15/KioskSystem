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
		
		<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		<br><br><br><br><br><br><br><br><br><br><br>
		
		<div class="pagebreak"></div> 
		
		<a href="/change_settings.php">Admin</a>
		<p>(Don't touch if you don't know what you're doing!)</p>
	</body>
</html>

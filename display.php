<html>
	<head>
		
		<?php
			require("settings.php");
			
			
			function enabled($num){
				
				global $toggleDir;
				$name = "$toggleDir/$num";
				
				return file_exists($name);
			}
			
		?>
				
		<link rel="stylesheet" href="css/display.css">
		
		<meta http-equiv="refresh" content="2;">
		
	</head>
	
	<body>
		
		<table class="fullTable">
		
		<?php
			for($i=1 ; $i<=$numKiosks ; $i++){
				echo "
				<tr class='tableRow'>
					<td class='name'><b>Kiosk $i</b></td>
				";
				
				echo enabled($i)?  "<td class='state enabled'>Enabled</td>" : "<td class='state disabled'>Disabled</td>";
				
				echo "</tr>";
			}
		?>
		
		</table>
		
		
	</body>


</html>

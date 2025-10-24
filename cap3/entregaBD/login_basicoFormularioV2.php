<!DOCTYPE html>
<html>
	<head>
		<title>Formulario de login</title>		
		<meta charset = "UTF-8">
	</head>
	<body>	
		<?php
    if (isset($_GET['error']) && !empty($_GET['error'])) {
        echo "<p style='color:red;'>" . htmlspecialchars($_GET['error']) . "</p>";
    }
     ?>
		<form action = "login_basicoV2.php" method = "POST">
			<label for="nombre">nombre</label>			
			<input name = "nombre" type = "text">
			<label for="clave">clave</label>				
			<input name = "clave" type = "password">						
			<input type = "submit">
		</form>
	</body>
</html>
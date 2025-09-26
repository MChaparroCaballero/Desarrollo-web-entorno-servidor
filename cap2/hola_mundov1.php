<!DOCTYPE html>
<html>
	<head>
		<title>Hola mundo</title>
	</head>
	<body>
	<?php
    $nombre = $_GET["nombre"];
    if ($nombre=="Pepe") {
        echo "<table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Edad</th>
                </tr>
            </thead>
            <tr>
                <td>Pepe</td>
                <td>Serrano</td>
                <td>16</td>
            </tr>
            <tr>
                <td>Alexa</td>
                <td>Gaga</td>
                <td>200</td>
            </tr>
            <tr>
                <td>Jose luis</td>
                <td>Aragon</td>
                <td>20</td>
            </tr>
        </table>";
    } else {
        echo "Hola no Pepe";
    }

	?>
	</body>
</html>
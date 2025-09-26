<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <table>
        
            <?php
            for($i=1;$i<5;$i++){
                 
              echo "<tr></tr>"; 
                for($j=1;$j<5;$j++){
                   $aleatorio = rand(1, 4); 
                echo "<td><td><img src='images/foto$aleatorio.jpg' alt='' width='350' height='300'></td></td>";
            }
            }
            ?>
        
        
        
    </table>
</body>
</html>
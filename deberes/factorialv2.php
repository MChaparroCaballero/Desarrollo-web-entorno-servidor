<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

$numFactorial = $_GET['number'];


function factorial($numFactorial){

if($numFactorial >0){
   for($i=$numFactorial-1; $i>0; $i--){
    $numFactorial = $numFactorial*$i;
}
}else{
    $numFactorial = -1;
}
return $numFactorial;
   
    
}

echo " el numero factorial es ". factorial($numFactorial);
     ?>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    session_start();
    $time1=$_SESSION['tiempo'];
    $time2=time();

    
    if(($time2-$time1)<10){
        echo "<p>Tu dinero: ".$_SESSION['dinero']."</p>";
        $time1=$time2;
    }else{
        header("Location: formulario.php");
    }
     ?>
     
    
</body>
</html>
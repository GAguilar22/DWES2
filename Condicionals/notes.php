<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

    $numeroale = random_int(0,10);
    echo $numeroale  . "<br>";
    
    if($numeroale <=4){
        echo "Suspès";
    }elseif ($numeroale ==5){
        echo "Aprovat";
    }elseif ($numeroale ==6){
        echo "Bé";
    }elseif ($numeroale >=8){
        echo "Notable";
    } else{
        echo "Excel·lent";
    }

?>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $numero = random_int(0,100);
    echo $numero . "<br>";

    if(($numero %2) ==0) {
        echo "El numero es parell";
    } else{
        echo "El número es senar" ;
    }

    ?>
</body>
</html>
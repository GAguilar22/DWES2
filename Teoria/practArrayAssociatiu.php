<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php

    //En els arrays assosciatius, utilitzem $clau => $valor per assosiar cada possicio de l'array el index que volguem i així afegir el valor que necessitem
    //D'aquesta manera ens guardem tant la clau com el valor per a poder modificar/eliminar en qualsevol moment la informació que volguem

    $arr = array(
        "POR" => "Ter Stegen",
        "DEF" => "Gerard Piqué",
        "MED" => "Sergio Busquets",
        "DEL" => "Leo Messi"
    );

    foreach ($arr as $key => $value) {
    echo "$key: $value <br>";
    }

    ?>
    
</body>
</html>
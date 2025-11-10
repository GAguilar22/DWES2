<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!--Primera classe de DWES-->

   <?php
    $alumnes1 = "Carles";
    $alumnes2 = "Youssef";
    $alumnes3 = "Edu";

    $alumnes = [];
    echo $alumnes[0];
    echo $alumnes[1];
    echo $alumnes[2];

    $alumnes = ["Carles", "Youssef", "Edu"];
    
    // Imprimir tot un array
    // Foreach ($array as $variableNova)
    foreach($aslumnes as $alumne){
        echo "$alumne <br>";
    }

    ?>    
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    // Variable que contará quants cops el resultat es 7
    $cops7 =0;
    // Amb el for hem d'inicialitzar la variable, fins on ha d'arribar i com la volem modificar
    for($tirada =1; $tirada <=10; $tirada++) {
        $dau1 = rand(1,6);
        $dau2 = rand(1,6);        
        
        // Variable que sumarà el resultat de cada dau
        $suma = $dau1 + $dau2;

        echo "<p> Llançament $tirada: Dau 1 : $dau1  Dau 2: $dau2 . Suma: $suma </p>";
        
        // If per a que si la suma de les tirades es 7 la guardi i al finalitzar el programa ho mostri per pantalla
        if($suma ==7){
            $cops7++;
        }
    }
    echo "<p> La suma ha estat 7 un total de vegades:" . "$cops7 </p>";

    ?>
</body>
</html>
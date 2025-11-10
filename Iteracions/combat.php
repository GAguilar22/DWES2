<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php
    //Inicialitzem totes les variables que necessitem
    $vidajugador = 100;
    $vidaenemic = 100;
    $golpejugador = rand(1,25);
    $golpeenemigo= rand(1,25);
    $Torn = 1;

    // Creem una flag per a que quan es compleixi l'objectiu del bucle, poguem sortir
    $flag =false;
    
    while(!$flag) {
        // Fem que el torn dels atacs s'autoincrementi
        echo "<p> Torn ". $Torn++. ": </p>";
        
        // Fem que la vida total es vagi restant conforme reb atacs del enemic
        $vidajugador = $vidajugador - $golpeenemigo;
        echo "<p> El enemigo hace un golpe de " . $golpeenemigo . " : Vida restante del jugador: " . $vidajugador . ".</p>";

        // Fem lu mateix que abans pero amb la vida del enemic
        $vidaenemic = $vidaenemic - $golpejugador;
        echo "<p> El jugador hace un golpe de " . $golpejugador . " : Vida restante del enemigo: " . $vidaenemic . ".</p>";

        // Creem un if per si el jugador mor, que es declari guanyador al enemic
        // Posem la flag per a que quan es compleixi, s'acabi el bucle
        if($vidajugador <= 0){
            echo  "<p> El jugador ha muerto, gana el enemigo </p>";
            $flag = true;
        }        
        // Creem un else if per si l'enemic mor, es declari guanyador al jugador
        // Posem la flag per a que es compleixi i s'acabi el bucle
        elseif($vidaenemic <=0){
            echo "<p> El enemigo ha muerto, gana el jugador </p>";
            $flag = true;
        }
        
        // Posem les variables dels atacs fora dels if pero dintre del while per a que entrin en el bucle
        $golpejugador = rand(1,25);
        $golpeenemigo= rand(1,25);
        
    }

    ?>
</body>
</html>
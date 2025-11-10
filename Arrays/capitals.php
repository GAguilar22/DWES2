<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php

    $EU = array(
        "España" => "Madrid",
        "Luxembourg"=>"Luxembourg",
        "Belgium"=> "Brussels", 
        "Denmark"=>"Copenhagen", 
        "Finland"=>"Helsinki", 
        "France" => "Paris", 
        "Slovakia"=>"Bratislava", 
        "Slovenia"=>"Ljubljana", 
        "Germany" => "Berlin", 
        "Greece" => "Athens", 
        "Ireland"=>"Dublin", 
        "Netherlands"=>"Amsterdam"
    );

    //Creem la taula
    echo "<table>";

    // Utilitzem foreach per a recorre tota la taula
    foreach ($EU as $pais => $capital)

    {
        // Utilitzem echo tr per a crear una fila
        echo "<tr>";
            echo  "<td>";
            //Utilizem td per a posar els paîsos en una columna
            echo "<td> $pais </td>";
            //Utilitzem un altre td per a crear una nova columna on aniran les capitals          
            echo "<td> $capital </td>";

        echo "<tr>";
    
    }
    // Tanquem la taula
    echo "</table>";
    

    ?>
</body>
</html>
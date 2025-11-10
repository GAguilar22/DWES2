<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    $diessemana = array  ("Dilluns", "Dimarts", "Dimecres", "Dijous" , "Divendres" , "Dissabte" , "Diumenge");
    foreach ($diessemana as $dia) 
    {
        echo "$dia  <br>";
    }
    echo "<p> El $diessemana[3] només tinc 3 hores de classe </p>";

    ?>
</body>
</html>
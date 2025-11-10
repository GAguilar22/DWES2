<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
    <!-- Insertem les instruccions per com sera la nostra taula-->
<style>
    table, th, td{
        border: 2px solid black;
        border-collapse: collapse;
        width: 12%;
    }
</style>
<body>
    <?php
        // Introduim dins de cada array per posició tots els jugadors del club
        $plantilla = array(

            "Porteros" => [
                "Thibaut Courtois",
                "Andriy Lunin",
            ],

            "Defensas" => [
                "Daniel Carvajal",
                "Eder Gabriel Militao",
                "David Alaba",
                "Lucas Vázquez",
                "Jesús Vallejo Làzaro",
                "Francisco José García",
                "Antonio Rüdiger",
                "Ferland Mendy",
            ],

            "Centrocampistas" => [
                "Jude Bellingham",
                "Eduardo Camavinga",
                "Federico Santiago Valverde",
                "Luka Modrić",
                "Aurélien Tchouameni",
                "Arda Güler",
                "Daniel Ceballos",
            ],

            "Delanteros" => [
                "Vinicius Junior",
                "Kylian Mbappé",
                "Rodrygo Goes",
                "Endrick Felipe",
                "Brahim Díaz",
            ]
                
        );

    // Creem un foreach per a que recorri l'array
    
    foreach ($plantilla  as  $posicion => $nombre)
    {
            print "<li> $posicion</li>";
            print "<ul>";
        foreach ( $nombre as $jugador)
        {
            print "<li> $jugador</li>";
        }
        print "</ul>";
    }
    ?>
</body>
</html>
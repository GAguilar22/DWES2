<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php

    $nom ="";
    $email="";
    $password="";
    $comentaris="";
    $genere = "";
    $aficions = array();
    $curs = "";

    //$_REQUEST recull dades tant de GET com de POST
    //Variables existeixen i no estan buides
    if (isset($_REQUEST["nom"]) && !empty($_REQUEST["nom"])) {
        $nom = $_REQUEST["nom"];
        echo "Hola, " . $nom . "!";
    }

    if (isset($_REQUEST["email"]) && !empty($_REQUEST["email"])) {
        $email = $_REQUEST["email"];
        echo "El teu email és: " . $email . "!";
    }

    if (isset($_REQUEST["password"]) && !empty($_REQUEST["password"])) {
        $password = $_REQUEST["password"];
        echo "La contrasenya és: " . $password . "!";
    }

    if (isset($_REQUEST["comentaris"]) && !empty($_REQUEST["comentaris"])) {
        $comentaris = $_REQUEST["comentaris"];
        echo "Aquests son els teus comentaris: " . $comentaris . "!";
    }

    // Ara recollim els camps que faltaven seguint el mateix estil
    if (isset($_REQUEST["genere"]) && !empty($_REQUEST["genere"])) {
        $genere = $_REQUEST["genere"];
        echo "Gènere: " . $genere . "!";
    }

    if (isset($_REQUEST["aficions"]) && !empty($_REQUEST["aficions"])) {
        $aficions = $_REQUEST["aficions"]; // serà un array si s'han seleccionat múltiples
        echo "Aficions: ";
        foreach ($aficions as $a) {
            echo $a . " ";
        }
        echo "!";
    }

    if (isset($_REQUEST["curs"]) && !empty($_REQUEST["curs"])) {
        $curs = $_REQUEST["curs"];
        echo "Curs: " . $curs . "!";
    }



    ?>

</body>
</html>
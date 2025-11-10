<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php

    if (isset($_SESSION["nom"])) {
        echo "<p> Hola " . $_SESSION["nom"] . "</p>";
        echo "<p> Ets a la pàgina 1 </p>";
        echo "<p> <a href='sessionsPag2.php'>Anar a la pàgina 2</a></p>";
        echo "<p> <a href='sessionsPag3.php'> Sortir </a></p>";
    } else {

    ?>

        <h1>Escriu el teu nom:</h1>

        <form action="sessionsPag2.php" method="post">

            <p>Nom: <input type="text" name="nom" id="nom"></p>

            <input type="submit" name="inpenv" value="Enviar">

        </form>

    <?php

    }

    ?>

</body>

</html>
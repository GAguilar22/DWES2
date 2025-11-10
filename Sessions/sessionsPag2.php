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


    if (isset($_POST["nom"])) {
        $_SESSION["nom"] = $_POST["nom"];
        echo "<p>Hola " . $_SESSION["nom"] . "</p>";
        echo "<p> Ets a la pàgina 2 </p>";
    } else {
        echo "<p>Hola " . $_SESSION["nom"] . "</p>";
        echo "<p> Ets a la pàgina 2 </p>";
    }

    ?>

    <a href="sessionsPag1.php">Anar a la pàgina 1 </a>


</body>

</html>
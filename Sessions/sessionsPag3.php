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

<h1>Usuari desautenticat</h1>


<?php

session_unset();
session_destroy();
?>

<a href="sessionsPag1.php">Anar a la pàgina 1</a>

</body>
</html>
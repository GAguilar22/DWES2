<?php
// Números del 1 al 99 con estilos
// Este ejercicio muestra los números del 1 al 99:
// - Múltiplos de 5 en azul y más grandes
// - Múltiplos de 7 en rojo y más pequeños
// - Múltiplos de 5 y 7 a la vez en verde
// - Salto de línea cada 10 números
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Números 1 a 99</title>

    <style>
        .multipleCinc{
            color: blue;
            font-size: 120%;
        }
        .multipleSet{
            color: red;
            font-size: 80%;
        }
        .multipleCincSet{
            color: green;
        }
    </style>
</head>

<body>

<?php

for ($i = 1; $i < 100; $i++) {

    // Variable on guardarem el número amb el seu span
    $numero = "";

    if ($i % 5 == 0 && $i % 7 == 0) {
        $numero = "<span class='multipleCincSet'>$i</span>";
    } elseif ($i % 5 == 0) {
        $numero = "<span class='multipleCinc'>$i</span>";
    } elseif ($i % 7 == 0) {
        $numero = "<span class='multipleSet'>$i</span>";
    } else {
        $numero = "<span>$i</span>";
    }

    echo $numero . " ";

    // Salt de línia cada 10 números
    if ($i % 10 == 0) {
        echo "<br>";
    }
}

?>

</body>
</html>

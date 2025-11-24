<?php
// Cifrado César
// Este ejercicio pide un mensaje en minúsculas y lo cifra con un desplazamiento de 5 posiciones
// usando el alfabeto catalan. Muestra el mensaje cifrado.
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form action="" method="POST">
        <label>Introdueix un missatge en minúscules:</label><br><br>
        <input type="text" name="textOriginal" required><br><br>
        <button type="submit">Xifrar</button>
    </form>
    
    <?php
    // Només inicialitzem variables
    $alfabet = "abcçdefghijklmnopqrstuvwxyz";
    $desplaçament = 5;
    $textXifrat = "";

    // Rebut del formulari POST
    $textOriginal = isset($_POST["textOriginal"]) ? $_POST["textOriginal"] : "";

    $i = 0; // inicialitzem el comptador

    while ($i < strlen($textOriginal)) {
        $lletra = $textOriginal[$i];          // agafem la lletra actual
        $posicio = strpos($alfabet, $lletra); // busquem la posició a l'alfabet

        if ($posicio !== false) {
            $novaPosicio = ($posicio + $desplaçament) % strlen($alfabet);
            $textXifrat .= $alfabet[$novaPosicio];
        } else {
            $textXifrat .= $lletra; // si no és lletra minúscula, la deixem igual
        }

        $i++; // incrementem el comptador
    }

    echo "<p>Frase xifrada: <strong>$textXifrat</strong></p>";

    ?>

</body>

</html>